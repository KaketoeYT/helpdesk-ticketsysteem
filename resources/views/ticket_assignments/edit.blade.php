<x-base-layout>

<div>
    <h1>Ticket Assignment Bewerken</h1>
    <button><a href="{{ route('ticket_assignments.index') }}">Terug</a></button>

    <form action="{{ route('ticket_assignments.update', $ticketAssignment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="user_id">Toegewezen aan:</label>
            <select id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $ticketAssignment->user_id }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select><br>
        <button type="submit">Ticket Assignment Bijwerken</button>
    </form>

</x-base-layout>