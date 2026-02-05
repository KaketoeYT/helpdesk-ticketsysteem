<div class="container">
    <h1>Locations Overzicht</h1>
    
    @if($locations->isEmpty())
        <p>Er zijn geen locaties.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->name }}</td>
                        <td>{{ $location->created_at }}</td>
                        <td>
                              <btn><a href="{{ route('locations.edit', $location->id) }}">Edit</a></btn>
                            <!-- Actions buttons -->
                            <form action="{{ route('locations.destroy', $location->id) }}" method="POST" style="display:inline;">
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
