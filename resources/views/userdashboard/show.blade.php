<x-base-layout>

    <div class="container mt-5">
        <div class="mb-4 text-center">
            <h1 class="h2 fw-bold text-white mb-1">Berichten</h1>
            <p class="text- small">Chat over ticket #{{ $ticket->id }}</p>
        </div>

        <div class="chat-container shadow-lg">
            <ul class="chat-list">

                <!-- original issue description -->
                <div class="ticket-description mb-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <span class="ticket-title">Ticket Description</span>
                            <div class="ticket-subject">{{ $ticket->subject }}</div>
                        </div>
                        <div class="ticket-meta">
                            {{ optional($ticket->created_at)->format('d-m-Y H:i') }}
                        </div>
                    </div>

                    <div class="ticket-body">
                        {!! nl2br(e($ticket->description)) !!}
                    </div>
                </div>

                @foreach ($chats as $chat)
                    <li class="{{ auth()->id() === $chat->user_id ? 'text-end' : '' }}">
                        <div class="chat-message {{ auth()->id() === $chat->user_id ? 'own' : '' }}">
                            <span class="chat-user-name">{{ $chat->user->name }}</span>
                            <div class="chat-text text-white">
                                {{ $chat->message }}
                            </div>
                            <span class="chat-timestamp">
                                {{ $chat->created_at }}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>

            <hr style="border-color: #334155;">

            @if ($ticket->status->id !== 3)
                <form action="{{ route('userdashboard.storeChat', $ticket->id) }}" method="POST" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <textarea name="message" placeholder="Typ je bericht..." class="form-control form-control-dark" rows="3" required></textarea>
                    </div>
                    <div class="d-flex gap-2 mt-3 align-items-center">
                        <button type="submit" class="btn btn-primary btn-send shadow-sm" style="white-space: nowrap;">
                            Bericht Versturen
                        </button>
                    </div>
                </form>
            @else
                <div class="alert alert-warning mt-4" style="background-color: #334155; color: white; border: none;">
                    Dit ticket is gesloten. Je kunt geen berichten meer versturen.
                </div>
            @endif
        </div>

        <br>

        @auth
            @if (auth()->user()->role === 'admin' || auth()->user()->role === 'worker')
                <div class="chat-container shadow-lg mt-4">
                    <div class="mb-4 text-center">
                        <h1 class="h2 fw-bold text-white mb-1">Chat control</h1>
                        <p class="text-muted small">Beheer de status en prioriteit van dit ticket</p>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="status_id" class="form-label text-white-50 small fw-bold">TICKET STATUS</label>
                            <select name="status_id" id="status_id" class="form-select form-select-sm"
                                style="background-color: #0f172a; border: 1px solid #334155; color: #f8fafc;">
                                <option value="">Verander Status</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}"
                                        {{ old('status_id', $ticket->status_id) == $status->id ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="priority_id" class="form-label text-white-50 small fw-bold">PRIORITEIT</label>
                            <select name="priority_id" id="priority_id" class="form-select form-select-sm"
                                style="background-color: #0f172a; border: 1px solid #334155; color: #f8fafc;">
                                <option value="">Verander Priority</option>
                                @foreach ($priorities as $priority)
                                    <option value="{{ $priority->id }}"
                                        {{ old('priority_id', $ticket->priority_id) == $priority->id ? 'selected' : '' }}>
                                        P{{ $priority->number }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <form id="statusForm" action="{{ route('userdashboard.updateStatus', $ticket->id) }}" method="POST"
                        style="display: none;">
                        @csrf
                        <input type="hidden" name="status_id" id="statusValue">
                    </form>

                    <form id="priorityForm" action="{{ route('userdashboard.updatePriority', $ticket->id) }}"
                        method="POST" style="display: none;">
                        @csrf
                        <input type="hidden" name="priority_id" id="priorityValue">
                    </form>
                </div>
            @endif
        @endauth

        <script>
            //Automaticly scroll down the message list for ease of use
            document.addEventListener('DOMContentLoaded', function() {
                const chatList = document.querySelector('.chat-list');
                if (chatList) {
                    chatList.scrollTop = chatList.scrollHeight;
                }
            });

            // Handle status update
            document.getElementById('status_id').addEventListener('change', function() {
                if (this.value) {
                    document.getElementById('statusValue').value = this.value;
                    document.getElementById('statusForm').submit();
                }
            });

            // Handle priority update
            document.getElementById('priority_id').addEventListener('change', function() {
                if (this.value) {
                    document.getElementById('priorityValue').value = this.value;
                    document.getElementById('priorityForm').submit();
                }
            });
        </script>
</x-base-layout>

