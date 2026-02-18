<x-base-layout>

<div>
    <h1>Nieuwe Chat Aanmaken</h1>
    <button><a href="{{ route('chats.index') }}">Terug</a></button>
    
    <form action="{{ route('chats.store') }}" method="POST">
        @csrf
        <div>
            <label for="ticket_id">Ticket:</label>
            <select id="ticket_id" name="ticket_id" required>
                @foreach ($tickets as $ticket)
                    <option value="{{ $ticket->id }}">{{ $ticket->subject }}</option>
                @endforeach
            </select>
        </div>
            <div>
                <label for="user_id">Gebruiker:</label>
                <select id="user_id" name="user_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        <div>
            <label for="message">Bericht:</label>
            <input type="text" id="message" name="message" value="{{ old('message') }}" required>
        </div>
        
        <button type="submit">Chat Aanmaken</button>
    </form>
</div>

</x-base-layout>