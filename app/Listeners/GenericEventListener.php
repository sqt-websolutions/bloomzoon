<?php

namespace App\Listeners;

use App\Events\GenericEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\EmailNotificationService;
use Illuminate\Support\Facades\Log;

class GenericEventListener
{
    public $event_listener_callback_map;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
       $this->event_listener_callback_map = [
          'User' => [
              static function ($event) {
                    return EmailNotificationService::send_email_notification($event->event->email, config('notifications.account_activation'));
                    }
                ],
           'Order' => [
               static function ($event) {
                  (new OrderCreatedListener)->handle($event);
               }
           ]
       ];
    }

    /**
     * Handle the event.
     *
     * @param GenericEvent $event
     * @return void
     */
    public function handle(GenericEvent $event): void
    {
        if(!isset($this->event_listener_callback_map[$event->event->type])){
            return;
        }
         $listeners = $this->event_listener_callback_map[$event->event->type];
         foreach ($listeners as $listener){
             $listener($event);
         }
    }
}
