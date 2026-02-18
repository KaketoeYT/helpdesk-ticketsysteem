    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Dark Mode Custom Overrides */
        body {
            background-color: #0f172a;
            color: #f8fafc;
        }

        /* Navigation Styling */
        .navbar-custom {
            background-color: #1e293b;
            border-bottom: 1px solid #334155;
            padding: 0.75rem 1rem;
        }

        .navbar-brand {
            font-weight: 700;
            color: #818cf8 !important;
        }

        .nav-link {
            color: #94a3b8 !important;
            font-weight: 500;
            transition: color 0.2s;
        }

        .nav-link:hover {
            color: #f1f5f9 !important;
        }

        .nav-link.active {
            color: #4f46e5 !important;
        }

        /* Original Ticket Card Styling */
        .ticket-card {
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 20px;
        }

        .table {
            --bs-table-bg: #1e293b;
            --bs-table-color: #f1f5f9;
            --bs-table-border-color: #334155;
            --bs-table-hover-bg: #2d3748;
        }

        .table thead th {
            color: #94a3b8;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .badge-status {
            background: rgba(59, 130, 246, 0.2);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.5);
        }

        .badge-priority {
            background: rgba(245, 158, 11, 0.1);
            color: #fbbf24;
            border: 1px solid rgba(245, 158, 11, 0.4);
        }

        .btn-edit {
            color: #818cf8;
            text-decoration: none;
            font-weight: 500;
        }

        .btn-delete-link {
            background: none;
            border: none;
            color: #f87171;
            font-weight: 500;
        }

        footer {
            border-top: 1px solid #334155;
            color: #64748b;
            padding: 2rem 0;
            margin-top: 4rem;
            text-align: center;
        }
    </style>

    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="/">SupportDesk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @auth
                        @if (auth()->user()->role === 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{ route('tickets.index') }}">Tickets</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ route('ticket_assignments.index') }}">Assignments</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('locations.index') }}">Locations</a>
                            </li>
                        @endif
                    @endauth
                    @auth
                        @if (auth()->user()->role === 'user')
                            <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Mijn tickets</a></li>
                        @endif
                    @endauth
                </ul>
                <div class="navbar-nav">
                    @guest
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    @else
                        <span class="nav-link text-white-50 small">Hello, {{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-danger">Logout</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} Support System - All Rights Reserved</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

