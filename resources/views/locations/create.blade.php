<x-base-layout>

<div>
    <h1>Nieuwe Locatie Aanmaken</h1>
    <button><a href="{{ route('locations.index') }}">Terug</a></button>
    
    <form action="{{ route('locations.store') }}" method="POST">
        @csrf
        
        <div>
            <label for="name">Locatie Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div>
            <label for="country">Land:</label>
            <input type="text" id="country" name="country" value="{{ old('country') }}" required>
        </div>
        <div>
            <label for="city">Stad:</label>
            <input type="text" id="city" name="city" value="{{ old('city') }}" required>
        </div>
        <div>
            <label for="street">Straat:</label>
            <input type="text" id="street" name="street" value="{{ old('street') }}" required>
        </div>
        <div>
            <label for="street_number">Nummer:</label>
            <input type="text" id="street_number" name="street_number" value="{{ old('street_number') }}" required>
        </div>
        
        <button type="submit">Locatie Aanmaken</button>
    </form>
</div>

</x-base-layout>