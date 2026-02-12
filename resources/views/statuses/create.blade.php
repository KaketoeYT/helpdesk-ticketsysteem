<x-base-layout>

<div>
    <h1>Nieuwe Status Aanmaken</h1>
    <button><a href="{{ route('statuses.index') }}">Terug</a></button>
    
    <form action="{{ route('statuses.store') }}" method="POST">
        @csrf
        
        <div>
            <label for="name">Status Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label>
                Standaard status:
                <input 
                    type="checkbox" 
                    name="is_default" 
                    value="1"
                    {{ old('is_default') ? 'checked' : '' }}
                >
            </label>
        </div>
        
        <button type="submit">Status Aanmaken</button>
    </form>
</div>

</x-base-layout>