    <x-base-layout>
        <h1 class="text-2xl font-bold mb-4">Create Ticket Assignment</h1>

        <form action="{{ route('ticket_assignments.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label for="ticket_id" class="block text-sm font-medium text-gray-700">Ticket</label>
                <select name="ticket_id" id="ticket_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($tickets as $ticket)
                        <option value="{{ $ticket->id }}">{{ $ticket->subject }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">User</label>
                <select name="user_id" id="user_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }} 
                            <span class="text-gray-500 text-xs">({{ $user->role }})</span>
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Create Assignment</button>
            </div>
        </form>
    </x-base-layout>