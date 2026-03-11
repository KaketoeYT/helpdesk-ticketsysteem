<div style="font-family: Arial, Helvetica, sans-serif; color: #1a1a1a;">
    <h1>Ticket <span style="color:#4f46e5;">#{{ $ticket->id }}</span> in behandeling</h1>
    <p>Hallo {{ $ticket->user?->name ?? 'gebruiker' }},</p>
    <p>Je ticket is nu in behandeling genomen door onze support.</p>
    <ul>
        <li><strong>Onderwerp:</strong> {{ $ticket->subject }}</li>
        <li><strong>Huidige status:</strong> {{ $ticket->status?->name ?? 'Onbekend' }}</li>
    </ul>
    <p>We werken eraan en geven je een update zodra er nieuws is.</p>
    <p>Met vriendelijke groet,<br />Helpdesk Team</p>
</div>