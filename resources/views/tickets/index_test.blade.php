<x-base-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Dark Mode Custom Overrides */
        body {
            background-color: #0f172a;
            /* Deep Navy/Black */
            color: #f8fafc;
        }

        .ticket-card {
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 20px;
        }

        .table {
            --bs-table-bg: #1e293b;
            --bs-table-color: #f1f5f9;
            --bs-table-border-color: #334155;
            --bs-table-hover-bg: #2d3748;
        }

        .table thead th {
            color: #94a3b8;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-top: none;
        }

        /* Status Badge Styling */
        .badge-status {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.5);
        }

        .badge-priority {
            background: rgba(245, 158, 11, 0.1);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.4);
        }

        /* Action Buttons */
        .btn-edit {
            color: #818cf8;
            text-decoration: none;
            font-weight: 500;
        }

        .btn-edit:hover {
            color: #a5b4fc;
            text-decoration: underline;
        }

        .btn-delete-link {
            background: none;
            border: none;
            color: #f87171;
            padding: 0;
            font-weight: 500;
        }

        .btn-delete-link:hover {
            color: #fca5a5;
            text-decoration: underline;
        }

        .btn-view {
            color: #34d399;
            text-decoration: none;
            font-weight: 500;
        }
        .btn-view:hover {
            color: #6ee7b7;
            text-decoration: underline;
        }
    </style>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 fw-bold text-white mb-1">Tickets Overzicht</h1>
                <p class="text-white small">Beheer en bekijk alle actieve tickets</p>
            </div>
            <a href="{{ route('tickets.create') }}" class="btn btn-primary px-4 py-2 shadow-sm"
                style="background-color: #4f46e5; border: none;">
                + Nieuwe Ticket
            </a>
        </div>

        <div class="ticket-card shadow-lg">
            @if ($tickets->isEmpty())
                <div class="text-center py-5">
                    <p class="text-muted">Er zijn momenteel geen tickets.</p>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Onderwerp</th>
                                <th>Priority</th>
                                <th>Location</th>
                                <th>Created</th>
                                <th class="text-end">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td class="text-white font-monospace">#{{ $ticket->id }}</td>
                                    <td class="fw-semibold text-white">{{ $ticket->user->name }}</td>
                                    <td>
                                        <span class="badge badge-status px-2 py-1">
                                            {{ $ticket->status->name ?? 'N/A' }}
                                        </span>
                                    </td>
                                    <td class="text-white">{{ $ticket->category->name ?? '-' }}</td>
                                    <td class="text-white">{{ $ticket->subject }}</td>
                                    <td>
                                        <span class="badge badge-priority px-2 py-1">
                                            P{{ $ticket->priority->number ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="text-white small">{{ $ticket->location->name ?? '-' }}</td>
                                    <td class="text-white small">{{ $ticket->created_at }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-3">
                                            <a href="{{ route('userdashboard.show', $ticket->id) }}" class="btn-view">View Chat</a>
                                            <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn-edit">Edit</a>

                                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-delete-link"
                                                    onclick="return confirm('Weet je het zeker?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-base-layout>
