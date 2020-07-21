<?php

namespace App\Listeners;

use App\Events\GenericEvent;
use App\Http\Controllers\CartController;
use App\Notification;
use App\OrderDetail;
use App\Payment;
use App\Order;
use App\Sale;
use App\Purchase;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redis;


class OrderCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param GenericEvent $event
     * @return void
     */
    public function handle( GenericEvent $event ): void
    {
        $order = $event->event;
        \Log::info($order);
        $orderId = $order['id']['order_id'];
        $orderItems = CartController::getCartItems();
        $orderTotal = 0;
        $orderQuantityTotal = 0;
        $sellers_id = [];
        $user_id = $order['user_id']['id'];

        // log the order items
        foreach ($orderItems as $productId => $orderItem){

            $orderTotal+= $orderItem['total'];
            $orderQuantityTotal+= $orderItem['quantity'];
            OrderDetail::create([
                'order_id' => $orderId,
                'product_id' => $productId,
                'quantity' => $orderItem['quantity']
            ]);
        }

       // log the payment
        $payment = Payment::create([
            'order_id' => $orderId,
            'user_id' => $user_id,
            'response' => json_encode($order->payment)
        ]);

        // update the order
        Order::find($orderId)->update(['payment_id' =>$payment['id']]);

        // create a sale for the seller
        foreach ($orderItems as $productId => $orderItem) {
            Sale::create([
                'buyer_id' => $user_id,
                'order_id' => $orderId,
                'seller_id' => $orderItem['seller_id'],
                'product_id' => $productId,
                'total_amount' => $orderTotal,
                'quantity' => $orderQuantityTotal,
                'payment_mode' => 'card'
            ]);

            $sellers_id[] = $orderItem['seller_id'];
        }
        // create a purchase for the buyer
        Purchase::create([ 'order_id' => $orderId, 'user_id' => $user_id ]);

        // send order received email for the buyer & seller

        // create a notification for the buyer
        Notification::create([
            'user_id'=> $user_id,
            'message' => "New Order Received with ID of $orderId"
        ]);

        array_map(static function($id)use($orderId){
            Notification::create([
                'user_id'=> $id,
                'message' => "New Order Received with ID of $orderId"
            ]);
        }, array_unique($sellers_id));

        // if we got here in this chain, clear the cart
        Redis::del('cart');

    }
}
