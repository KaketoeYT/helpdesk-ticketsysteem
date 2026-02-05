<x-base-layout>

<div class="container">
    <h1>Tickets Overzicht</h1>
    <button><a href="{{ route('tickets.create') }}">Maak een nieuwe Ticket</a></button>
    
    @if($tickets->isEmpty())
        <p>Er zijn geen tickets.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Onderwerp</th>
                    <th>Priority</th>
                    <th>Location</th>
                    <th>Created At</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->id }}</td>
                        <td>{{ $ticket->status->name ?? '-' }}</td> <!-- ?? '-' laat een '-' zien als de status van de ticket null is -->
                        <td>{{ $ticket->category->name ?? '-' }}</td>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->priority->number ?? '-' }}</td>
                        <td>{{ $ticket->location->name ?? '-' }}</td>
                        <td>{{ $ticket->created_at }}</td>
                        <td>
                            <!-- Actions buttons -->
                            <!-- Edit -->
                            <button><a href="{{ route('tickets.edit', $ticket->id)}}">Edit</a></button>

                            <!-- Destroy -->
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;">
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