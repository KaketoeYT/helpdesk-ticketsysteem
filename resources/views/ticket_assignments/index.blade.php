<x-base-layout>
    <div class="container">
        <h1>Ticket Assignments Overzicht</h1>
        <button><a href="{{ route('ticket_assignments.create') }}">Maak een nieuwe Ticket Assignment</a></button>

        @if ($ticketAssignments->isEmpty())
            <p>Er zijn geen ticket assignments.</p>
        @else
            <table border="1" cellpadding="8" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Ticket</th>
                        <th>Category</th>
                        <th>Priority</th>
                        <th>Location</th>
                        <th>Created At</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ticketAssignments as $ticketAssignment)
                        <tr>
                            <td>{{ $ticketAssignment->id }}</td>
                            <td>{{ $ticketAssignment->user->name }}</td>
                            <td>{{ $ticketAssignment->ticket->subject }}</td>
                            <!-- ?? '-' laat een '-' zien als de status van de ticket null is -->
                            <td>{{ $ticketAssignment->category->name ?? '-' }}</td>
                            <td>{{ $ticketAssignment->ticket->priority->number ?? '-' }}</td>
                            <td>{{ $ticketAssignment->ticket->location->name ?? '-' }}</td>
                            <td>{{ $ticketAssignment->ticket->created_at ?? '-' }}</td>
                            <td>
                                <!-- Actions buttons -->
                                <!-- Edit -->
                                <button><a href="{{ route('tickets.edit', $ticketAssignment->ticket->id) }}">Edit</a></button>

                                <!-- Destroy -->
                                <form action="{{ route('tickets.destroy', $ticketAssignment->ticket->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Weet je het zeker?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-base-layout>