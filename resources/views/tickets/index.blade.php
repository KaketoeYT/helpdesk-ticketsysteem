<x-base-layout>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 fw-bold text-white mb-1">Tickets Overzicht</h1>
                <p class="text-white small">Beheer en bekijk alle tickets</p>
            </div>
            <a href="{{ route('tickets.create') }}" class="btn btn-primary px-4 py-2 shadow-sm"
                style="background-color: #4f46e5; border: none;">
                + Nieuwe Ticket
            </a>
        </div>

        {{-- Filter Form --}}
        <form method="GET" action="{{ route('tickets.index') }}" class="d-flex gap-2 mb-4 align-items-end">

            {{-- Categorie Filter --}}
            <div style="flex: 1; min-width: 200px;">
                <label for="category_id" class="form-label small text-uppercase fw-semibold"
                    style="color: #94a3b8; letter-spacing: 0.05em;">Categorie</label>
                <select name="category_id" id="category_id" class="form-select border-0 text-white"
                    style="background-color: #1e293b; border: 1px solid #334155 !important;">
                    <option value="">-- Alle categorieën --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ isset($categoryId) && $categoryId == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Status Filter --}}
            <div style="flex: 1; min-width: 200px;">
                <label for="status_id" class="form-label small text-uppercase fw-semibold"
                    style="color: #94a3b8; letter-spacing: 0.05em;">Status</label>
                <select name="status_id" id="status_id" class="form-select border-0 text-white"
                    style="background-color: #1e293b; border: 1px solid #334155 !important;">
                    <option value="">-- Alle statussen --</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}"
                            {{ isset($statusId) && $statusId == $status->id ? 'selected' : '' }}>{{ $status->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Prioriteit Filter --}}
            <div style="flex: 1; min-width: 200px;">
                <label for="priority_id" class="form-label small text-uppercase fw-semibold"
                    style="color: #94a3b8; letter-spacing: 0.05em;">Prioriteit</label>
                <select name="priority_id" id="priority_id" class="form-select border-0 text-white"
                    style="background-color: #1e293b; border: 1px solid #334155 !important;">
                    <option value="">-- Alle prioriteiten --</option>
                    @foreach ($priorities as $priority)
                        <option value="{{ $priority->id }}"
                            {{ isset($priorityId) && $priorityId == $priority->id ? 'selected' : '' }}>
                            P{{ $priority->number }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Locatie Filter --}}
            <div style="flex: 1; min-width: 200px;">
                <label for="location_id" class="form-label small text-uppercase fw-semibold"
                    style="color: #94a3b8; letter-spacing: 0.05em;">Locatie</label>
                <select name="location_id" id="location_id" class="form-select border-0 text-white"
                    style="background-color: #1e293b; border: 1px solid #334155 !important;">
                    <option value="">-- Alle locaties --</option>
                    @foreach ($locations as $location)
                        <option value="{{ $location->id }}"
                            {{ isset($locationId) && $locationId == $location->id ? 'selected' : '' }}>
                            {{ $location->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Open Tickets Toggle --}}
            @if (empty($hideUnassignedToggle))
                <div style="min-width: 180px;">
                    <label class="form-label small text-uppercase fw-semibold"
                        style="color: #94a3b8; letter-spacing: 0.05em;">
                        Toewijzing
                    </label>
                    <div class="form-check d-flex align-items-center"
                        style="height: 41px; background-color: #1e293b; border: 1px solid #334155; border-radius: 6px; padding-left: 2.8em;">
                        <input class="form-check-input" type="checkbox" value="1" id="unassigned" name="unassigned"
                            {{ request('unassigned') ? 'checked' : '' }}
                            style="width: 1.2em; height: 1.2em; margin-top: 0;">
                        <label class="form-check-label ms-2" for="unassigned"
                            style="color: #f8fafc; font-size: 0.85em; cursor: pointer;">
                            Unassigned only
                        </label>
                    </div>
                </div>
            @endif

            {{-- Filter Button --}}
            <button type="submit" class="btn btn-primary px-4"
                style="background-color: #4f46e5; border: none; height: 41px;">Filter</button>
            {{-- Reset Button --}}
            <a href="{{ route('tickets.index') }}" class="btn btn-outline-secondary px-4"
                style="border: 1px solid #334155; color: #f8fafc; height: 41px;">Reset</a>
        </form>

        <div class="ticket-card shadow-lg">
            @if ($tickets->isEmpty())
                <div class="text-center py-5">
                    <p class="text-white">Er zijn momenteel geen tickets.</p>
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
                                <th>Closed</th>
                                <th class="text-end">Acties</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td class="text-white font-monospace">#{{ $ticket->id }}</td>
                                    <td class="fw-semibold text-white">{{ $ticket->user->name }}</td>
                                    <td>
                                        <span class="badge badge-status px-2 py-1" style="background-color: {{ $ticket->status->color ?? '#3b82f6' }}; color: #fff; border: 1px solid rgba(255,255,255,.2);">
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
                                    <td class="text-white small">{{ $ticket->created_at ?? '-' }}</td>
                                    <td class="text-white small">{{ $ticket->closed_at ?? '-' }}</td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-3">

                                            @auth
                                                <a href="{{ route('userdashboard.show', $ticket->id) }}"
                                                    class="btn-view">View Chat</a>

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

                                                @if (auth()->user()->role === 'worker' || auth()->user()->role === 'admin')
                                                    <a href="{{ route('workerdashboard.take', $ticket->id) }}"
                                                        class="btn-edit">Take Ticket</a>
                                                @endif
                                            @endauth
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

