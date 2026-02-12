<x-base-layout>

<div>
    <h1>User Bewerken</h1>
    <button><a href="{{ route('users.index') }}">Terug</a></button>

    {{-- Validation errors --}}
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password" value="{{ old('password', $user->password) }}" required>
        </div>
        <div>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="">-- kies role --</option>
                
                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}> Admin </option>
                <option value="worker" {{ old('role', $user->role) == 'worker' ? 'selected' : '' }}> Worker </option>
                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}> User </option>

            </select>
        </div>
        
        <button type="submit">User Bijwerken</button>
    </form>

</x-base-layout>