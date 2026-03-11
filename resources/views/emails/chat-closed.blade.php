<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; }
        .header { background-color: #1a1a2e; color: #f5c542; padding: 20px; border-radius: 5px 5px 0 0; }
        .content { background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; }
        .footer { background-color: #eee; padding: 15px 20px; font-size: 12px; color: #888; border-radius: 0 0 5px 5px; }
        .label { font-weight: bold; color: #555; }
        .ticket-info { background-color: #e8f4f8; padding: 15px; border-left: 4px solid #0288d1; margin: 15px 0; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Ticket Afgesloten</h2>
    </div>

    <div class="content">
        <p>Hallo {{ $ticket->user->name }},</p>

        <p>Uw ticket is zojuist afgesloten en gesloten voor verdere communicatie.</p>

        <div class="ticket-info">
            <p><span class="label">Ticket ID:</span> #{{ $ticket->id }}</p>
            <p><span class="label">Onderwerp:</span> {{ $ticket->subject }}</p>
            <p><span class="label">Gesloten op:</span> {{ $ticket->closed_at?->format('d-m-Y H:i') ?? now()->format('d-m-Y H:i') }}</p>
        </div>

        <p>Dank u voor het gebruik van ons ticketsysteem. Mocht u nog vragen hebben, kunt u contact opnemen via de contactpagina.</p>

        <p>Met vriendelijke groet,<br>
        Het Support Team</p>
    </div>

    <div class="footer">
        <p>Dit is een automatische notificatie van het helpdesk ticketsysteem. Beantwoord deze email niet direct.</p>
    </div>
</body>
</html>
