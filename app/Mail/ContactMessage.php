<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;


    public array $message;

    /**
     * ContactMessage constructor.
     * @param array $textMessage
     */
    public function __construct(array $textMessage)
    {
        if (!empty($textMessage)) {
            $this->message = $textMessage;
        }
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->view('emails.contactMessage')->with($this->message);
    }
}
