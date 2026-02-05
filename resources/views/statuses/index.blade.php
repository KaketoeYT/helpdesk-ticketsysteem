<div class="container">
    <h1>Status Overzicht</h1>
    
    @if($statuses->isEmpty())
        <p>Er zijn geen statussen.</p>
    @else
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Created at</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($statuses as $status)
                    <tr>
                        <td>{{ $status->id }}</td>
                        <td>{{ $status->name }}</td>
                        <td>{{ $status->created_at }}</td>
                        <td>
                            <!-- Actions buttons -->
                            <!-- Edit -->
                            <btn><a href="{{ route('statuses.edit', $status->id) }}">Edit</a></btn>

                            <!-- Delete -->
                            <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" style="display:inline;">
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
