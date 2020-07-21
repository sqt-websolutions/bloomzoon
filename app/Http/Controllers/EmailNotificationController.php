<?php

namespace App\Http\Controllers;

use App\Traits\JsonResponse;
use Illuminate\Http\Request;
use App\Services\EmailNotificationService;
use Illuminate\Support\Str;

class EmailNotificationController extends Controller
{
    use JsonResponse;

    public function handle(Request $request){

        if(!$request->notification_type){
          return  $this->send_response(false, null, 400, 'notification_type field is not provided');
        }
          $notifier = Str::ucfirst($request->notification_type);
          $validation = '\App\Http\Requests\\' .$notifier;
          $this->validate($request, (new $validation )->rules() );
          $mail_notification_instance = '\App\Mail\\'.$notifier;

          foreach ($request->message_bag as $message ){
              EmailNotificationService::send_email_notification($message['recipient'], $message, $mail_notification_instance);
          }
          return $this->send_response(true, [], 200, 'mail sent to recipients');
    }
}
