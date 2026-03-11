<div style="font-family: Arial, Helvetica, sans-serif; color: #1a1a1a;">
    <h1>Ticket <span style="color:#4f46e5;">#{{ $ticket->id }}</span> aangemaakt</h1>
    <p>Hallo {{ $ticket->user?->name ?? 'gebruiker' }},</p>
    <p>Bedankt voor het indienen van je ticket. We hebben het volgende ticket ontvangen:</p>
    <ul>
        <li><strong>Onderwerp:</strong> {{ $ticket->subject }}</li>
        <li><strong>Status:</strong> {{ $ticket->status?->name ?? 'Niet vastgesteld' }}</li>
        <li><strong>Prioriteit:</strong> {{ $ticket->priority?->number ?? '-' }}</li>
    </ul>
    <p>Beschrijving:</p>
    <blockquote style="border-left: 4px solid #4f46e5; padding-left: 12px;">
        {{ $ticket->description }}
    </blockquote>
    <p>Onze support is op de hoogte en je hoort zo snel mogelijk van ons.</p>
    <p>Met vriendelijke groet,<br />Helpdesk Team</p>
</div>