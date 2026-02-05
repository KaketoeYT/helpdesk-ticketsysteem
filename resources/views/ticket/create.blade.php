<div>
    <h1>Ticket aanmaken</h1>

    <form method="POST" action="{{ route('ticket.store') }}">
        @csrf

        <!-- subject -->
        <div>
            <label for="subject">Onderwerp</label>
            <input type="text" name="subject" id="subject" value="{{ old('subject') }}" required> <!-- old(name) zorgt ervoor dat bij een fout je data ingevuld blijft -->
        </div>

        <!-- category -->
        <div>
            <label for="category">Category</label>
            <select name="category" id="category" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category') == $category->id ? 'selected' : '' }}> <!-- als oude id het zelfde is als id selecteer -->
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- description -->
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4" required> {{ old('description') }} </textarea>
        </div>

        <!-- priority -->
        <div>
            <label for="priority">Priority</label>
            <select name="priority" id="priority" required>
                @foreach ($priorities as $priority)
                    <option value="{{ $priority->id }}"
                        {{ old('priority') == $priority->id ? 'selected' : '' }}>
                        {{ $priority->number }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- location -->
         <div>
            <label for="location">location</label>
            <select name="location" id="location" required>
                @foreach ($locations as $location)
                    <option value="{{ $location->id }}"
                        {{ old('location') == $location->id ? 'selected' : '' }}> <!-- als oude id het zelfde is als id selecteer -->
                        {{ $location->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- submit -->
        <button type="submit">
            Create Ticket
        </button>
    </form>
</div>
