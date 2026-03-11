<x-base-layout>

    <div class="container mt-5">
        <div class="hero-card shadow-lg mb-5">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-5 fw-bold text-white mb-3">Welkom bij de Service Desk</h1>
                    <p class="lead text-secondary mb-4">
                        Meld problemen, volg je tickets in real-time en communiceer direct met onze technici.
                        Samen zorgen we voor een vlekkeloze workflow.
                    </p>
                    <div class="d-flex gap-3">
                        @auth
                            @if (auth()->user()->role === 'admin')
                                <a href="{{ route('userdashboard.create') }}" class="btn btn-primary-custom shadow-sm">
                                    Nieuw Probleem Melden
                                </a>
                            @endif

                            <a href="{{ route('dashboard') }}" class="btn btn-primary-custom shadow-sm">
                                Mijn Tickets Bekijken
                            </a>
                        @endauth

                        @guest
                            <a href="{{ route('login') }}" class="btn btn-primary-custom shadow-sm">
                                Login
                            </a>
                        @endguest
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block text-center">
                    <div style="font-size: 100px; opacity: 0.5;">🛠️</div>
                </div>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="icon-box bg-indigo-soft">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path
                                d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z" />
                        </svg>
                    </div>
                    <h3 class="h5 fw-bold">Snelle Registratie</h3>
                    <p class="text-secondary small mb-0">Maak binnen 30 seconden een ticket aan met alle nodige details
                        en bijlagen.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="icon-box bg-emerald-soft">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                        </svg>
                    </div>
                    <h3 class="h5 fw-bold">Live Updates</h3>
                    <p class="text-secondary small mb-0">Ontvang direct meldingen wanneer de status van je probleem
                        verandert of er een reactie is.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="icon-box bg-amber-soft">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path
                                d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z" />
                        </svg>
                    </div>
                    <h3 class="h5 fw-bold">Direct Chat</h3>
                    <p class="text-secondary small mb-0">Chat direct met de toegewezen medewerker om onduidelijkheden
                        snel op te lossen.</p>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
