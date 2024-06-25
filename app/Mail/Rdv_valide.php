<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Rdv_valide extends Mailable
{
    use Queueable, SerializesModels;

    public $code;

    public $date_rendezvous;

    public $heure_rendezvous;

    public $prenom;

    public $nom;

    public $agence;

    public function __construct($code, $date_rendezvous, $heure_rendezvous, $prenom, $nom, $agence)
    {
        $this->code = $code;
        $this->date_rendezvous = $date_rendezvous;
        $this->heure_rendezvous = $heure_rendezvous;
        $this->prenom = $prenom;
        $this->nom = $nom;
        $this->agence = $agence;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Rdv Valide',
            from: new Address('reclamation@cnss.gov.gn'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'mail.rendezvous.rdv-valide',
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
