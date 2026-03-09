<x-base-layout>

    <style>
        .form-control::placeholder {
            font-size: 0.85em;
            color: #94a3b8;
            opacity: 0.7;
        }
    </style>

    <div>
        <h1>Nieuwe Categorie Aanmaken</h1>
        <button><a href="{{ route('categories.index') }}">Terug</a></button>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <div>
                <label for="name">Categorie Naam:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <button type="submit">Categorie Aanmaken</button>
        </form>
    </div>

</x-base-layout>
