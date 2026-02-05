<div>
    <h1>Nieuwe Locatie Aanmaken</h1>
    <button><a href="{{ route('locations.index') }}">Terug</a></button>
    
    <form action="{{ route('locations.store') }}" method="POST">
        @csrf
        
        <div>
            <label for="name">Locatie Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        
        <button type="submit">Locatie Aanmaken</button>
    </form>
</div>