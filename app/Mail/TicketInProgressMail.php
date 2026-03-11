<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketInProgressMail extends Mailable
{
    use Queueable, SerializesModels;

    // Ticket data wordt hieraan gekoppeld zodat de e-mail tekst dynamisch wordt
    public function __construct(
        public Ticket $ticket,
    ) {}

    // Dit is de subject line van de e-mail die naar de gebruiker gaat
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ticket #' . $this->ticket->id . ' is in behandeling genomen',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.ticket-in-progress',
        );
    }
}
