<?php

namespace App\Mail;

use App\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NSTApplicationUpdate extends Mailable
{
    use Queueable, SerializesModels;

    public $registration;

    /**
     * Create a new message instance.
     *
     * @param Registration $registration
     */
    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.application-update')->with([
            'firstname' => $this->registration->applicant->firstname,
            'status' => $this->registration->application_status,
            'reason' => $this->registration->status_reason ?: 'Not Specified',
        ]);
    }
}
