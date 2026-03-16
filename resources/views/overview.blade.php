<x-base-layout>
    <div class="container mt-5">
        <h1 class="display-5 fw-bold text-white mb-4">Admin Overzicht</h1>
        <p class="text-white small">Tickets</p>

        <div class="row g-4 mb-5">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="icon-box bg-indigo-soft">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                    </div>
                    <h5 class="text-secondary small text-uppercase fw-bold mb-1">Open</h5>
                    <p class="display-6 fw-bold text-white mb-0">{{ $openTickets }}</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card">
                    <div class="icon-box" style="background: rgba(248, 113, 113, 0.1); color: #fbbf24;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zm0 13a6 6 0 1 1 0-12 6 6 0 0 1 0 12z" />
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 1 1 .708-.708L7.5 8.293V4.5A.5.5 0 0 1 8 4z" />
                        </svg>
                    </div>
                    <h5 class="text-secondary small text-uppercase fw-bold mb-1">In Behandeling</h5>
                    <p class="display-6 fw-bold text-white mb-0">{{ $inProgressTickets ?? 0 }}</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card">
                    <div class="icon-box" style="background: rgba(248, 113, 113, 0.1); color: #f87171;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                        </svg>
                    </div>
                    <h5 class="text-secondary small text-uppercase fw-bold mb-1">Gesloten</h5>
                    <p class="display-6 fw-bold text-white mb-0">{{ $closedTickets ?? 0 }}</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card">
                    <div class="icon-box bg-emerald-soft">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                        </svg>
                    </div>
                    <h5 class="text-secondary small text-uppercase fw-bold mb-1">Afhandeltijd</h5>
                    <p class="display-6 fw-bold text-white mb-0">
                        @if ($avgHandleTime)
                            {{ $avgHandleTime }}<span class="fs-6 fw-normal text-secondary">u</span>
                        @else
                            <span class="text-muted">-</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
