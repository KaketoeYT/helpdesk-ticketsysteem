<x-base-layout>

    <div class="container mt-5">
        {{-- Validation errors --}}
        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4 max-width-800 mx-auto"
            style="max-width: 800px;">
            <div>
                <h1 class="h2 fw-bold text-white mb-1">Ticket bewerken</h1>
                <p class="text-white small">Pas de details van ticket #{{ $ticket->id }} aan</p>
            </div>
            <a href="{{ route('tickets.index') }}" class="btn-back">
                &larr; Terug naar overzicht
            </a>
        </div>

        <div class="ticket-card shadow-lg">
            <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-12">
                        <label for="subject" class="form-label">Onderwerp</label>
                        <input type="text" name="subject" id="subject" class="form-control"
                            value="{{ old('subject', $ticket->subject) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-select" required>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category', $ticket->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="priority" class="form-label">Priority</label>
                        <select name="priority" id="priority" class="form-select" required>
                            @foreach ($priorities as $priority)
                                <option value="{{ $priority->id }}"
                                    {{ old('priority', $ticket->priority_id) == $priority->id ? 'selected' : '' }}>
                                    P{{ $priority->number }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="location" class="form-label">Location</label>
                        <select name="location" id="location" class="form-select" required>
                            @foreach ($locations as $location)
                                <option value="{{ $location->id }}"
                                    {{ old('location', $ticket->location_id) == $location->id ? 'selected' : '' }}>
                                    {{ $location->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select name="status_id" id="status" class="form-select" required>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}"
                                    {{ old('status_id', $ticket->status_id) == $status->id ? 'selected' : '' }}>
                                    {{ $status->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $ticket->description) }}</textarea>
                    </div>

                    <div class="col-12 mt-4">
                        <hr class="border-secondary mb-4">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                Ticket Opslaan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-base-layout>

