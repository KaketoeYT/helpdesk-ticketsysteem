<div>
    <h1>Locatie Bewerken</h1>
    <form action="{{ route('locations.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Locatie Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $location->name) }}" required>
        </div>
        
        <button type="submit">Locatie Bijwerken</button>
    </form>