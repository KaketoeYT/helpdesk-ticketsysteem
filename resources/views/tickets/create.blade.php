<x-base-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Dark Mode Basis */
        body {
            background-color: #0f172a;
            color: #f8fafc;
        }

        .ticket-card {
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 30px;
        }

        /* Form Labels styling */
        .form-label {
            color: #94a3b8;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }

        /* Input & Select styling */
        .form-control, .form-select {
            background-color: #0f172a !important;
            border: 1px solid #334155 !important;
            color: #f1f5f9 !important;
        }

        .form-control:focus, .form-select:focus {
            background-color: #0f172a;
            border-color: #4f46e5 !important;
            box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
            color: #fff;
        }

        /* Witte Placeholders */
        .form-control::placeholder {
            color: #ffffff !important;
            opacity: 0.8;
        }

        /* Select arrow kleur */
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%2394a3b8' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        }

        /* Button styling */
        .btn-submit {
            background-color: #4f46e5;
            border: none;
            padding: 10px 24px;
            font-weight: 600;
        }

        .btn-submit:hover {
            background-color: #4338ca;
        }

        .btn-back {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .btn-back:hover {
            color: #f8fafc;
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h2 fw-bold text-white mb-1">Ticket Aanmaken</h1>
                        <p class="text-white-50 small">Handmatig een ticket aanmaken in het systeem.</p>
                    </div>
                    <a href="{{ route('tickets.index') }}" class="btn-back">
                        &larr; Terug naar overzicht
                    </a>
                </div>

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger border-0 mb-4" style="background-color: rgba(239, 68, 68, 0.1); color: #f87171;">
                        <ul class="mb-0 small fw-medium">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="ticket-card shadow-lg">
                    <form method="POST" action="{{ route('tickets.store') }}">
                        @csrf

                        <div class="row">
                            {{-- Subject --}}
                            <div class="col-12 mb-4">
                                <label for="subject" class="form-label">Onderwerp</label>
                                <input type="text" id="subject" name="subject" class="form-control form-control-lg" 
                                       placeholder="Typ hier het onderwerp van de ticket..." value="{{ old('subject') }}" required>
                            </div>

                            {{-- Category & Priority --}}
                            <div class="col-md-6 mb-4">
                                <label for="category_id" class="form-label">Categorie</label>
                                <select name="category_id" id="category_id" class="form-select" required>
                                    <option value="" disabled selected>-- kies categorie --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="priority_id" class="form-label">Prioriteit</label>
                                <select name="priority_id" id="priority_id" class="form-select" required>
                                    <option value="" disabled selected>-- kies prioriteit --</option>
                                    @foreach ($priorities as $priority)
                                        <option value="{{ $priority->id }}" {{ old('priority_id') == $priority->id ? 'selected' : '' }}>
                                            Prioriteit {{ $priority->number }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Location & Status --}}
                            <div class="col-md-6 mb-4">
                                <label for="location_id" class="form-label">Locatie</label>
                                <select name="location_id" id="location_id" class="form-select" required>
                                    <option value="" disabled selected>-- kies locatie --</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label for="status_id" class="form-label">Status</label>
                                <select name="status_id" id="status_id" class="form-select" required>
                                    <option value="" disabled selected>-- kies status --</option>
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Description --}}
                            <div class="col-12 mb-4">
                                <label for="description" class="form-label">Beschrijving</label>
                                <textarea name="description" id="description" class="form-control" rows="5" 
                                          placeholder="Typ hier de volledige beschrijving..." required>{{ old('description') }}</textarea>
                            </div>

                            {{-- Submit --}}
                            <div class="col-12 text-end">
                                <hr class="my-4" style="border-color: #334155;">
                                <button type="submit" class="btn btn-primary btn-submit shadow-sm">
                                    Ticket Aanmaken
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>