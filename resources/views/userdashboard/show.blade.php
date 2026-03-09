<x-base-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Dark Mode Global Overrides */
        body {
            background-color: #0f172a;
            color: #f8fafc;
        }

        .chat-container {
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 24px;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Message Bubbles */
        .chat-timestamp {
            font-size: 0.75rem;
            color: #94a3b8;
            display: block;
            margin-top: 8px;
            text-align: right;
        }

        .chat-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-direction: column;
            gap: 1rem;
            max-height: 500px;
            overflow-y: auto;
            margin-bottom: 2rem;
        }

        .chat-message {
            background-color: #334155;
            padding: 12px 16px;
            border-radius: 12px;
            border-bottom-left-radius: 2px;
            max-width: 85%;
            position: relative;
        }

        .chat-message.own {
            background-color: #4f46e5;
            margin-left: auto;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 2px;

            .chat-timestamp {
                text-align: left;
            }
        }

        .chat-user-name {
            color: #818cf8;
            font-size: 0.85rem;
            font-weight: 700;
            display: block;
            margin-bottom: 4px;
        }

        /* Input Styling */
        .form-control-dark {
            background-color: #0f172a;
            border: 1px solid #334155;
            color: #f8fafc;
            border-radius: 8px;
        }

        .form-control-dark:focus {
            background-color: #0f172a;
            border-color: #4f46e5;
            color: #fff;
            box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
        }

        .form-control-dark::placeholder {
            color: #f8fafc;
            opacity: 0.7;
        }

        .btn-send {
            background-color: #4f46e5;
            border: none;
            padding: 10px 24px;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-send:hover {
            background-color: #6366f1;
            transform: translateY(-1px);
        }

        /* Styled original issue description */
        .ticket-description {
            background: linear-gradient(180deg, rgba(51, 65, 85, 0.12), rgba(17, 24, 39, 0.06));
            border: 1px solid rgba(51, 65, 85, 0.6);
            padding: 16px;
            border-radius: 10px;
            color: #e6eef8;
        }

        .ticket-title {
            font-size: 0.95rem;
            font-weight: 700;
            color: #a5b4fc;
            display: block;
        }

        .ticket-subject {
            font-size: 1rem;
            font-weight: 600;
            color: #f8fafc;
        }

        .ticket-meta {
            font-size: 0.8rem;
            color: #94a3b8;
        }

        .ticket-body {
            margin-top: 10px;
            color: #dbeafe;
            line-height: 1.45;
        }
    </style>

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

