<x-base-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Dark Mode Custom Overrides */
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

        /* Form Styling */
        .form-label {
            color: #94a3b8;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            background-color: #0f172a !important;
            border: 1px solid #334155 !important;
            color: #f1f5f9 !important;
        }

        .form-control:focus,
        .form-select:focus {
            background-color: #0f172a;
            border-color: #4f46e5 !important;
            box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
            color: #fff;
        }

        /* Select arrow color adjustment */
        .form-select {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%2394a3b8' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
        }

        /* Button Styling */
        .btn-submit {
            background-color: #4f46e5;
            border: none;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-submit:hover {
            background-color: #4338ca;
            transform: translateY(-1px);
        }

        .btn-back {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.2s;
        }

        .btn-back:hover {
            color: #f8fafc;
        }

        .textwhite::placeholder {
            color: #94a3b8 !important;
        }

        /* Placeholder Styling */
        .form-control::placeholder,
        .form-control::-webkit-input-placeholder {
            color: #f1f5f9 !important;
            /* Wit/Lichtgrijs */
            opacity: 1;
            /* Zorgt dat de kleur niet vervaagd wordt */
        }

        /* Voor Firefox */
        .form-control:-moz-placeholder {
            color: #f1f5f9 !important;
            opacity: 1;
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h2 fw-bold text-white mb-1">Ticket Aanmaken</h1>
                        <p class="text-white-50 small">Vul de onderstaande gegevens in om een nieuwe hulpvraag te
                            starten.</p>
                    </div>
                    <a href="{{ route('dashboard') }}" class="btn-back">
                        &larr; Terug naar overzicht
                    </a>
                </div>

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="alert alert-danger border-0 shadow-sm mb-4"
                        style="background-color: rgba(239, 68, 68, 0.1); color: #f87171;">
                        <ul class="mb-0 small fw-medium">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="ticket-card shadow-lg">
                    <form method="POST" action="{{ route('userdashboard.store') }}">
                        @csrf

                        <div class="row">
                            {{-- Subject --}}
                            <div class="col-12 mb-4">
                                <label for="subject" class="form-label">Onderwerp</label>
                                <input type="text" id="subject" name="subject" class="form-control form-control-lg"
                                    placeholder="Korte omschrijving van het probleem" value="{{ old('subject') }}"
                                    required>
                            </div>

                            {{-- Category --}}
                            <div class="col-md-6 mb-4">
                                <label for="category_id" class="form-label">Categorie</label>
                                <select name="category_id" id="category_id" class="form-select" required>
                                    <option value="" disabled selected>-- Kies categorie --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Location --}}
                            <div class="col-md-6 mb-4">
                                <label for="location_id" class="form-label">Locatie</label>
                                <select name="location_id" id="location_id" class="form-select" required>
                                    <option value="" disabled selected>-- Kies locatie --</option>
                                    @foreach ($locations as $location)
                                        <option value="{{ $location->id }}"
                                            {{ old('location_id') == $location->id ? 'selected' : '' }}>
                                            {{ $location->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Priority --}}
                            <div class="col-12 mb-4">
                                <label for="priority_id" class="form-label">Prioriteit</label>
                                <select name="priority_id" id="priority_id" class="form-select" required>
                                    <option value="" disabled selected>-- Kies prioriteit --</option>
                                    @foreach ($priorities as $priority)
                                        <option value="{{ $priority->id }}"
                                            {{ old('priority_id') == $priority->id ? 'selected' : '' }}>
                                            Prioriteit {{ $priority->number }}
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

