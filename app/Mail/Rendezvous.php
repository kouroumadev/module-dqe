<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Rendezvous extends Mailable
{
    use Queueable, SerializesModels;

    public $code;

    public $email;

    public $prenom;

    public $nom;

    /**
     * Create a new message instance.
     */
    public function __construct($code, $email, $prenom, $nom)
    {
        $this->code = $code;
        $this->email = $email;
        $this->prenom = $prenom;
        $this->nom = $nom;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rendezvous',
            from: new Address('notification@cnssgn.com'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.rendezvous.rendezvous',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
