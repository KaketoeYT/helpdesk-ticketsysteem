@php
    use App\Models\Ticket;

    $tickets = Ticket::where('user_id', auth()->id())->get();
@endphp

<x-base-layout>

    <div class="container">
        <h1>Uw Tickets</h1>

        @auth
            @if (auth()->user()->role === 'worker')
                <button><a href="{{ route('tickets.index') }}">Bekijk tickets</a></button>
            @else
                <button><a href="{{ route('userdashboard.create') }}">Maak een nieuwe Ticket</a></button>
            @endif
        @endauth

        @auth
            @if (auth()->user()->role === 'user')
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
                                <th>Location</th>
                                <th>Created At</th>
                                <th>Acties</th>
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
                                    <td>{{ $ticket->location->name ?? '-' }}</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>
                                        <a href="{{ route('userdashboard.show', $ticket->id) }}">Open chat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endif

            @if (auth()->user()->role === 'worker' || auth()->user()->role === 'admin')

                @if (auth()->user()->assignments->isEmpty())
                    <p>U heeft nog geen toegewezen tickets.</p>
                @else

                    <table border="1" cellpadding="8" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Onderwerp</th>
                                <th>Location</th>
                                <th>Created At</th>
                                <th>Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (auth()->user()->assignments->pluck('ticket') as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->user->name ?? '-' }}</td>
                                    <td>{{ $ticket->status->name ?? '-' }}</td>
                                    <!-- ?? '-' laat een '-' zien als de status van de ticket null is -->
                                    <td>{{ $ticket->category->name ?? '-' }}</td>
                                    <td>{{ $ticket->subject }}</td>
                                    <td>{{ $ticket->location->name ?? '-' }}</td>
                                    <td>{{ $ticket->created_at }}</td>
                                    <td>
                                        <a href="{{ route('userdashboard.show', $ticket->id) }}">Open chat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            @endif

        @endauth

    </div>

</x-base-layout>

