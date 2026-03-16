@php
    use App\Models\Ticket;
    $tickets = Ticket::where('user_id', auth()->id())->get();
@endphp

<x-base-layout>
    <div class="container mt-5">
        {{-- Header Sectie --}}
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 fw-bold text-white mb-1">Uw Tickets</h1>
                <p class="text-white small">Beheer uw eigen aanvragen en toegewezen taken</p>
            </div>
            @auth
                @if (auth()->user()->role === 'worker')
                    <a href="{{ route('tickets.index') }}" class="btn btn-primary px-4 py-2 shadow-sm">
                        Bekijk alle tickets
                    </a>
                @else
                    <a href="{{ route('userdashboard.create') }}" class="btn btn-primary px-4 py-2 shadow-sm">
                        + Nieuwe Ticket
                    </a>
                @endif
            @endauth
        </div>

        {{-- Sectie voor Reguliere Gebruikers --}}
        @auth
            @if (auth()->user()->role === 'user')
                <div class="ticket-card shadow-lg mb-5">
                    @if ($tickets->isEmpty())
                        <div class="text-center py-5">
                            <p class="text-white opacity-50">U heeft nog geen tickets aangemaakt.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>Status</th>
                                        <th>Categorie</th>
                                        <th>Onderwerp</th>
                                        <th>Locatie</th>
                                        <th>Gemaakt Op</th>
                                        <th class="text-end">Acties</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)
                                        <tr>
                                            <td>
                                                <span class="badge badge-status px-2 py-1">
                                                    {{ $ticket->status->name ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="text-white">{{ $ticket->category->name ?? '-' }}</td>
                                            <td class="text-white fw-semibold">{{ $ticket->subject }}</td>
                                            <td class="text-white small">{{ $ticket->location->name ?? '-' }}</td>
                                            <td class="text-white small">{{ $ticket->created_at->format('d-m-Y H:i') }}</td>
                                            <td class="text-end">
                                                <a href="{{ route('userdashboard.show', $ticket->id) }}" class="btn-view">
                                                    Open chat
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            @endif

            {{-- Sectie voor Workers & Admins (Toegewezen taken) --}}
            @if (auth()->user()->role === 'worker' || auth()->user()->role === 'admin')
                <div class="ticket-card shadow-lg">
                    @if (auth()->user()->assignments->isEmpty())
                        <div class="text-center py-5">
                            <p class="text-white opacity-50">U heeft nog geen toegewezen tickets.</p>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Status</th>
                                        <th>Categorie</th>
                                        <th>Onderwerp</th>
                                        <th>Locatie</th>
                                        <th class="text-end">Acties</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (auth()->user()->assignments->pluck('ticket') as $ticket)
                                        <tr>
                                            <td class="text-white font-monospace">#{{ $ticket->id }}</td>
                                            <td class="text-white">{{ $ticket->user->name ?? '-' }}</td>
                                            <td>
                                                <span class="badge badge-status px-2 py-1">
                                                    {{ $ticket->status->name ?? '-' }}
                                                </span>
                                            </td>
                                            <td class="text-white">{{ $ticket->category->name ?? '-' }}</td>
                                            <td class="text-white fw-semibold">{{ $ticket->subject }}</td>
                                            <td class="text-white small">{{ $ticket->location->name ?? '-' }}</td>
                                            <td class="text-end">
                                                <div class="d-flex justify-content-end gap-3">
                                                    <a href="{{ route('userdashboard.show', $ticket->id) }}"
                                                        class="btn-view">Chat</a>

                                                    @if (auth()->user()->role === 'admin')
                                                        <a href="{{ route('tickets.edit', $ticket->id) }}"
                                                            class="btn-edit">Edit</a>
                                                        <form action="{{ route('tickets.destroy', $ticket->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn-delete-link"
                                                                onclick="return confirm('Weet je het zeker?')">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            @endif
        @endauth
    </div>
</x-base-layout>

