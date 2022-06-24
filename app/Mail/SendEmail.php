<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Email;

class SendEmail extends Mailable
{
    public $email_desc;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_desc)
    {
        $this->email_desc = $email_desc;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = Email::all()->last();
        return $this->from($mail->from_email)
                    ->subject($mail->subject)
                    ->view('layouts.mail');
    }
}
