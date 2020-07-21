<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Support\Facades\Redis;

class CartController extends Controller
{
    protected $cart_action_callbacks_map;

    public function __construct()
    {

        $this->cart_action_callbacks_map = [

            'add' => static function($data) {
                $product = Product::find($data->product_id);
                !$product && abort(404);

                $cart = json_decode(Redis::get('cart'), true) ?? [];

                $cart[$data->product_id] = [
                    'name' => $product->product_name,
                    'quantity' => +$data->quantity,
                    'seller_id' => $product->user_id->id,
                    'price' => $product->product_price,
                    'image' => $product->featured_img_url,
                    'total' => +$data->quantity *  $product->product_price
                ];

                Redis::set('cart', json_encode($cart));

                return [
                    'success' => true,
                    'message' => 'Cart updated successfully'
                ];
            },
            'cart_items' => static function ($data = null) {
                return ['cart_items' => json_decode(Redis::get('cart'), true) ];
            },
            'remove' => static function ($data) {

                $cart_items = json_decode(Redis::get('cart'), true);

                unset($cart_items[$data->product_id]);

                Redis::set('cart', json_encode($cart_items));

                return [
                    'success' => true,
                    'message' => 'Cart updated successfully'
                ];
            }
        ];
    }

    public function handle($action, $product_id = null, $quantity = null ){
        return $this->cart_action_callbacks_map[$action]((object)['product_id'=>$product_id, 'quantity'=>$quantity]);
    }

    public static function getCartItems(){
        return (new self)->handle('cart_items')['cart_items'];
    }
}
