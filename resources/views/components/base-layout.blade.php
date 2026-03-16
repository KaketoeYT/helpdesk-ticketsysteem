<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Service Desk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="/">Service Desk</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @auth
                        {{-- admin --}}
                        @if (auth()->user()->role === 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{ route('tickets.index') }}">Tickets</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                            <li class="nav-item"><a class="nav-link"
                                    href="{{ route('ticket_assignments.index') }}">Assignments</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('statuses.index') }}">Statuses</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('priorities.index') }}">Priorities</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('locations.index') }}">Locations</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('overview.index') }}">Overview</a></li>
                        @endif
                        @if (auth()->user()->role === 'worker')
                            <li class="nav-item"><a class="nav-link" href="{{ route('tickets.index') }}">Tickets</a></li>
                        @endif

                        <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Mijn tickets</a></li>
                    @endauth
                </ul>
                <div class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact.index') }}">Contact</a></li>

                    {{-- not logged in person --}}
                    @guest
                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                    @else
                        {{-- logged in user --}}
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

</body>

</html>

