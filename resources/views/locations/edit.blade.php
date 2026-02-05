<x-base-layout>

<div>
    <h1>Locatie Bewerken</h1>
    <button><a href="{{ route('locations.index') }}">Terug</a></button>

    <form action="{{ route('locations.update', $location->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Locatie Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $location->name) }}" required>
        </div>
        <div>
            <label for="country">Land:</label>
            <input type="text" id="country" name="country" value="{{ old('country', $location->country) }}" required>
        </div>
        <div>
            <label for="city">Stad:</label>
            <input type="text" id="city" name="city" value="{{ old('city', $location->city) }}" required>
        </div>
        <div>
            <label for="street">Straat:</label>
            <input type="text" id="street" name="street" value="{{ old('street', $location->street) }}" required>
        </div>
        <div>
            <label for="street_number">Nummer:</label>
            <input type="text" id="street_number" name="street_number" value="{{ old('street_number', $location->street_number) }}" required>
        </div>
        
        <button type="submit">Locatie Bijwerken</button>
    </form>

</x-base-layout>