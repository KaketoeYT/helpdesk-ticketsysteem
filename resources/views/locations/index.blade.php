<x-base-layout>

<div class="container">
    <h1>Locations Overzicht</h1>
    <button><a href="{{ route('locations.create') }}">Maak een nieuwe status</a></button>
    
    @if($locations->isEmpty())
        <p>Er zijn geen locaties.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Land</th>
                    <th>Stad</th>
                    <th>Straat</th>
                    <th>Nummer</th>
                    <th>Created At</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locations as $location)
                    <tr>
                        <td>{{ $location->id }}</td>
                        <td>{{ $location->name }}</td>
                        <td>{{ $location->country }}</td>
                        <td>{{ $location->city }}</td>
                        <td>{{ $location->street }}</td>
                        <td>{{ $location->street_number }}</td>
                        <td>{{ $location->created_at }}</td>
                        <td>
                            <button><a href="{{ route('locations.edit', $location->id) }}">Edit</a></button>
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

</x-base-layout>