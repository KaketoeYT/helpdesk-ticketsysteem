<x-base-layout>
    <style>
        .form-control::placeholder {
            font-size: 0.85em;
            color: #94a3b8;
            opacity: 0.7;
        }
    </style>

    <div>
        <h1>Nieuwe Prioriteit Aanmaken</h1>
        <button><a href="{{ route('priorities.index') }}">Terug</a></button>

        <form action="{{ route('priorities.store') }}" method="POST">
            @csrf

            <div>
                <label for="number">Prioriteit nummer:</label>
                <input type="text" id="number" name="number" value="{{ old('number') }}" required>
            </div>

            <button type="submit">Prioriteit Aanmaken</button>
        </form>
    </div>

</x-base-layout>
