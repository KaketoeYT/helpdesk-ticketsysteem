@php
    use App\Models\Ticket;

    $tickets = Ticket::where('user_id', auth()->id())->get();
@endphp

<x-base-layout>

    <div class="container">
        <h1>Tickets Overzicht</h1>
        <button><a href="{{ route('tickets.create') }}">Maak een nieuwe Ticket</a></button>

        @if ($tickets->isEmpty())
            <p>U heeft nog geen tickets.</p>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->id }}</td>
                            <td>{{ $ticket->status->name ?? '-' }}</td>
                            <!-- ?? '-' laat een '-' zien als de status van de ticket null is -->
                            <td>{{ $ticket->category->name ?? '-' }}</td>
                            <td>{{ $ticket->subject }}</td>
                            <td>{{ $ticket->priority->number ?? '-' }}</td>
                            <td>{{ $ticket->location->name ?? '-' }}</td>
                            <td>{{ $ticket->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</x-base-layout>

