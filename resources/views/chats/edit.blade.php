<x-base-layout>

<div>
    <h1>Chat Bewerken</h1>
    <button><a href="{{ route('chats.index') }}">Terug</a></button>

    <form action="{{ route('chats.update', $chat->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="message">Bericht:</label>
            <input type="text" id="message" name="message" value="{{ old('message', $chat->message) }}" required>
        </div>
        
        <button type="submit">Chat Bijwerken</button>
    </form>

</x-base-layout>