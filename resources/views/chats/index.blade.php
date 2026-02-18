<x-base-layout>
    <h1>Chats</h1>
    <ul>
        @foreach ($chats as $chat)
            <li>
                Chat voor: {{ $chat->user->name }} - Ticket: {{ $chat->ticket->subject }} - Laatste bericht: {{ $chat->message }} - {{ $chat->created_at }} 
                <a href="{{ route('chats.show', $chat->id) }}">Bekijk Chat</a>
                <a href="{{ route('chats.edit', $chat->id) }}">Bewerk Chat</a>
            </li>
        @endforeach
    </ul>
</x-base-layout>