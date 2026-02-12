<nav>
   @auth
       @if (auth()->user()->role === 'admin')
            <a href="{{route('tickets.index')}}">Tickets</a> |
            <a href="{{route('ticket_assignments.index')}}">Ticket Assignments</a> |
            <a href="{{route('users.index')}}">Users</a> |
            <a href="{{route('categories.index')}}">Categories</a> |
            <a href="{{route('statuses.index')}}">Statuses</a> |
            <a href="{{route('locations.index')}}">Locations</a> |
            <a href="{{route('priorities.index')}}">Priorities</a> |
       @endif
   @endauth        
     
   
    <a href="{{route('login')}}">Login</a> |
</nav>

{{$slot}}

<footer>
    footer
</footer>