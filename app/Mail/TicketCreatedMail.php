<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    // Ticket model wordt meegegeven en later gebruikt in de e-mail view
    public function __construct(
        public Ticket $ticket,
    ) {}

    // Met deze methode wordt het onderwerp van de e-mail ingesteld
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Bevestiging ticket #' . $this->ticket->id . ' is aangemaakt',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.ticket-created',
        );
    }
}
