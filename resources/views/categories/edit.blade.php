<x-base-layout>

<div>
    <h1>Categorie Bewerken</h1>
    <button><a href="{{ route('categories.index') }}">Terug</a></button>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Categorie Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        </div>
        
        <button type="submit">Categorie Bijwerken</button>
    </form>

<x-base-layout>