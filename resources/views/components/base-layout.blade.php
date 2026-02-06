<nav>
    <a href="{{route('tickets.index')}}">Tickets</a> |
    <a href="{{route('categories.index')}}">Categories</a> |
    <a href="{{route('statuses.index')}}">Statuses</a> |
    <a href="{{route('locations.index')}}">Locations</a> |
    <a href="{{route('priorities.index')}}">Priorities</a> |
</nav>

{{$slot}}

<footer>
    footer
</footer>