<x-base-layout>

<div>
    <h1>Status Bewerken</h1>
    <button><a href="{{ route('statuses.index') }}">Terug</a></button>

    <form action="{{ route('statuses.update', $status->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="name">Status Naam:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $status->name) }}" required>
        </div>

        <div>
            <label>
                Standaard status:
                <input 
                    type="checkbox" 
                    name="is_default" 
                    value="1"
                    {{ old('is_default', $status->is_default) ? 'checked' : '' }}
                >
            </label>
        </div>
        
        <button type="submit">Status Bijwerken</button>
    </form>
</div>

</x-base-layout>