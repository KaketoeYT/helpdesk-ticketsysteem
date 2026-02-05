<x-base-layout>

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