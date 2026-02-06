<x-base-layout>

<div class="container">
    <h1>Prioriteit Overzicht</h1>
    <button><a href="{{ route('priorities.create') }}">Maak een nieuwe Prioriteit</a></button>
    
    @if($priorities->isEmpty())
        <p>Er zijn geen prioriteiten.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nummer</th>
                    <th>Created At</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($priorities as $priority)
                    <tr>
                        <td>{{ $priority->id }}</td>
                        <td>{{ $priority->number }}</td>
                        <td>{{ $priority->created_at }}</td>
                        <td>
                            <button><a href="{{ route('priorities.edit', $priority->id) }}">Edit</a></button>
                            <!-- Actions buttons -->
                            <form action="{{ route('priorities.destroy', $priority->id) }}" method="POST" style="display:inline;">
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