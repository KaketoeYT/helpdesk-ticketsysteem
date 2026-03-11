<x-base-layout>

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

