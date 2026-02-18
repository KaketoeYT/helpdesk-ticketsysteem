<x-base-layout>
    <div class="container">
        <h1>Chat Details</h1>
        <p><strong>Bericht:</strong> {{ $chat->message }}</p>
        <p><strong>Gebruiker:</strong> {{ $chat->user->name }}</p>
        <p><strong>Ticket subject:</strong> {{ $chat->ticket->subject }}</p>
        <button><a href="{{ route('chats.index') }}">Terug</a></button>
    </div>
</x-base-layout>