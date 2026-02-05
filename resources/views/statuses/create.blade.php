<div>
    <h1>Nieuwe Status Aanmaken</h1>
    
    <form action="{{ route('statuses.store') }}" method="POST">
        @csrf
        
        <div>
            <label for="name">Status Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        
        <button type="submit">Status Aanmaken</button>
    </form>
</div>