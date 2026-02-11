<x-base-layout>

    <div class="container">
        <h1>User Overzicht</h1>

        @if ($users->isEmpty())
            <p>Er zijn geen users.</p>
        @else
            <table border="1" cellpadding="8" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Naam</th>
                        <th>Role</th>
                        <th>Created at</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <!-- Actions buttons -->
                                <!-- Edit -->
                                <button><a href="{{ route('users.edit', $user->id) }}">Edit</a></button>

                                <!-- Delete -->
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    style="display:inline;">
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

