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

        /* Custom Scrollbar for Chat */
        .chat-list::-webkit-scrollbar {
            width: 6px;
        }
        .chat-list::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 10px;
        }
    </style>

    <div class="container mt-5">
        <div class="mb-4 text-center">
            <h1 class="h2 fw-bold text-white mb-1">Berichten</h1>
            <p class="text-muted small">Chat over ticket #{{ $ticket->id }}</p>
        </div>

        <div class="chat-container shadow-lg">
            <ul class="chat-list">
                @foreach ($chats as $chat)
                    <li class="{{ auth()->id() === $chat->user_id ? 'text-end' : '' }}">
                        <div class="chat-message {{ auth()->id() === $chat->user_id ? 'own' : '' }}">
                            <span class="chat-user-name">{{ $chat->user->name }}</span>
                            <div class="chat-text text-white">
                                {{ $chat->message }}
                            </div>
                            <span class="chat-timestamp">
                                {{ $chat->created_at}}
                            </span>
                        </div>
                    </li>
                @endforeach
            </ul>

            <hr style="border-color: #334155;">

            <form action="{{ route('userdashboard.storeChat', $ticket->id) }}" method="POST" class="mt-4">
                @csrf
                <div class="form-group">
                    <textarea 
                        name="message" 
                        placeholder="Typ je bericht..." 
                        class="form-control form-control-dark" 
                        rows="3" 
                        required></textarea>
                </div>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary btn-send mt-3 shadow-sm">
                        Bericht Versturen
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        //Automaticly scroll down the message list for ease of use
        document.addEventListener('DOMContentLoaded', function() {
            const chatList = document.querySelector('.chat-list');
            if (chatList) {
                chatList.scrollTop = chatList.scrollHeight;
            }
        });
    </script>
</x-base-layout>