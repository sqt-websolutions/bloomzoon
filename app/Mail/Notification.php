<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $notification_data;

    /**
     * Create a new message instance.
     *
     * @param $notification_data
     */
    public function __construct(object $notification_data)
    {
        $this->notification_data = $notification_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.template')->subject($this->notification_data->title);
    }
}
