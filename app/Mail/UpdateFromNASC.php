<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateFromNASC extends Mailable
{
    use Queueable, SerializesModels;

    public $name;

    public $subject;

    public $message;

    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $subject
     * @param $message
     */
    public function __construct($name,$subject, $message)
    {
        $this->name = $name;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('emails.contact')->with([
            'name' => $this->name,
            'message' => $this->message,
        ]);
    }
}
