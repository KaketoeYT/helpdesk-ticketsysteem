<x-base-layout>
    <div class="container mt-5">
        <h1 class="h2 fw-bold text-white mb-4">Admin Overzicht</h1>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card bg-dark text-white shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Open Tickets</h5>
                        <p class="display-4 fw-bold">{{ $openTickets }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-dark text-white shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Gemiddelde Afhandeltijd</h5>
                        <p class="display-6 fw-bold">
                            @if ($avgHandleTime)
                                {{ $avgHandleTime }} uur
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
