<div class="container">
    <h1>Categories Overzicht</h1>
    <button><a href="{{ route('categories.create') }}">Maak een nieuwe Categorie</a></button>
    
    @if($categories->isEmpty())
        <p>Er zijn geen categorieën.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Created At</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td>
                            <button><a href="{{ route('categories.edit', $category->id) }}">Edit</a></button>
                            <!-- Actions buttons -->
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Weet je het zeker?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
