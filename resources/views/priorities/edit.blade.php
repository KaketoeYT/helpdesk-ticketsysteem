<x-base-layout>

<div>
    <h1>Prioriteit Bewerken</h1>
    <button><a href="{{ route('priorities.index') }}">Terug</a></button>

    <form action="{{ route('priorities.update', $priority->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="number">Prioriteit Naam:</label>
            <input type="text" id="number" name="number" value="{{ old('number', $priority->number) }}" required>
        </div>
        
        <button type="submit">Prioriteit Bijwerken</button>
    </form>

</x-base-layout>