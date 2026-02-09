<x-base-layout>

<div>
    <h1>Ticket aanmaken</h1>

    <a href="{{ route('tickets.index') }}">
        <button type="button">Terug</button>
    </a>

    {{-- Validation errors --}}
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('tickets.store') }}">
        @csrf

        {{-- Subject --}}
        <div>
            <label for="subject">Onderwerp</label><br>
            <input
                type="text"
                id="subject"
                name="subject"
                value="{{ old('subject') }}"
                required
            >
        </div>

        {{-- Category --}}
        <div>
            <label for="category_id">Categorie</label><br>
            <select name="category_id" id="category_id" required>
                <option value="">-- kies categorie --</option>
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Description --}}
        <div>
            <label for="description">Beschrijving</label><br>
            <textarea
                name="description"
                id="description"
                rows="4"
                required
            >{{ old('description') }}</textarea>
        </div>

        {{-- Priority --}}
        <div>
            <label for="priority_id">Prioriteit</label><br>
            <select name="priority_id" id="priority_id" required>
                <option value="">-- kies prioriteit --</option>
                @foreach ($priorities as $priority)
                    <option
                        value="{{ $priority->id }}"
                        {{ old('priority_id') == $priority->id ? 'selected' : '' }}
                    >
                        {{ $priority->number }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Location --}}
        <div>
            <label for="location_id">Locatie</label><br>
            <select name="location_id" id="location_id" required>
                <option value="">-- kies locatie --</option>
                @foreach ($locations as $location)
                    <option
                        value="{{ $location->id }}"
                        {{ old('location_id') == $location->id ? 'selected' : '' }}
                    >
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Status --}}
        <div>
            <label for="status_id">Status</label><br>
            <select name="status_id" id="status_id" required>
                <option value="">-- kies status --</option>
                @foreach ($statuses as $status)
                    <option
                        value="{{ $status->id }}"
                        {{ old('status_id') == $status->id ? 'selected' : '' }}
                    >
                        {{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Submit --}}
        <div>
            <button type="submit">Ticket aanmaken</button>
        </div>
    </form>
</div>

</x-base-layout>
