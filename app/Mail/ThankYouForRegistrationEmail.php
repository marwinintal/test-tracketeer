<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ThankYouForRegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    use Queueable, SerializesModels;

    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Thank You!')
                    ->view('emails.thank-you-for-regisration'); // Ensure this view exists
    }
}
