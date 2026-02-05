<x-base-layout>

<div>
    <h1>Ticket bewerken</h1>
    <button><a href="{{ route('tickets.index') }}">Terug</a></button>

    <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
        @csrf
        @method('PUT')

        <!-- subject -->
        <div>
            <label for="subject">Onderwerp</label>
            <input type="text" name="subject" id="subject" value="{{ old('subject', $ticket->subject) }}" required>
        </div>

        <!-- category -->
        <div>
            <label for="category">Category</label>
            <select name="category" id="category" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category', $ticket->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- description -->
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" required>
                {{ old('description', $ticket->description) }}
            </textarea>
        </div>

        <!-- priority -->
        <div>
            <label for="priority">Priority</label>
            <select name="priority" id="priority" required>
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}"
                        {{ old('priority', $ticket->priority_id) == $priority->id ? 'selected' : '' }}>
                        {{ $priority->number }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- location -->
        <div>
            <label for="location">Location</label>
            <select name="location" id="location" required>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}"
                        {{ old('location', $ticket->location_id) == $location->id ? 'selected' : '' }}>
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- submit -->
        <button type="submit">
            Update Ticket
        </button>
    </form>
</div>

</x-base-layout>