<?php


namespace App\Services;

use Illuminate\Support\Facades\Mail;

class EmailNotificationService
{
    public static function send_email_notification(string $recipient, array $data, $mail_instance = 'Notification'): bool
    {
        $mail_class = '\App\Mail\\'.$mail_instance;
        return Mail::to($recipient)->send( new $mail_class((object)$data) );
    }
}
