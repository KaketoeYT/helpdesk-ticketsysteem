<div>
    <h1>Status Bewerken</h1>
    <form action="{{ route('statuses.update', $status->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Status Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $status->name) }}" required>
        </div>
        
        <button type="submit">Status Bijwerken</button>
    </form>