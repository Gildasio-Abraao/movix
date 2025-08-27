<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $code;
    public string $user_name;
    public function __construct(string $code, string $name)
    {
        $this->code = $code;
        $this->user_name = $name;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Movix: Confirme seu E-mail',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.otp',
            with: [
                'code' => $this->code,
                'user_name' => $this->user_name,
            ],
        );
    }
}
