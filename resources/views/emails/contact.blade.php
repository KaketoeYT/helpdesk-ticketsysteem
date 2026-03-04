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
    </style>
</head>
<body>
    <div class="header">
        <h2>Nieuw contactbericht</h2>
    </div>

    <div class="content">
        <p><span class="label">Van:</span> {{ $senderName }}</p>
        <p><span class="label">E-mail:</span> {{ $senderEmail }}</p>
        <p><span class="label">Onderwerp:</span> {{ $mailSubject }}</p>

        <hr>

        <p><span class="label">Bericht:</span></p>
        <p>{{ $mailMessage }}</p>
    </div>

    <div class="footer">
        <p>Dit bericht is verstuurd via het contactformulier van Crypto Dashboard.</p>
    </div>
</body>
</html>
