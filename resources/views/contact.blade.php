<x-base-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Dark Mode Custom Overrides */
        body {
            background-color: #0f172a;
            color: #f8fafc;
        }

        .contact-card {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            border: 1px solid #334155;
            border-radius: 16px;
            padding: 40px;
        }

        .form-control, .form-control:focus {
            background-color: #1e293b;
            border: 1px solid #334155;
            color: #f8fafc;
            border-radius: 8px;
            padding: 12px;
        }

        .form-control::placeholder {
            color: white; 
            opacity: 0.7; /* Subtiel transparant zodat het verschilt van getypte tekst */
        }

        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.25 row rgba(79, 70, 229, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: #94a3b8;
            margin-bottom: 8px;
        }

        .btn-primary-custom {
            background-color: #4f46e5;
            border: none;
            padding: 12px 24px;
            font-weight: 600;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary-custom:hover {
            background-color: #4338ca;
            transform: translateY(-2px);
        }

        .alert-custom-success {
            background: rgba(52, 211, 153, 0.1);
            border: 1px solid #34d399;
            color: #34d399;
            border-radius: 12px;
        }

        .alert-custom-error {
            background: rgba(248, 113, 113, 0.1);
            border: 1px solid #f87171;
            color: #f87171;
            border-radius: 12px;
        }
    </style>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                
                <div class="contact-card shadow-lg">
                    <h1 class="display-6 fw-bold text-white mb-4">Neem contact met ons op</h1>
                    <p class="text-secondary mb-5">Heb je een vraag die niet direct een ticket vereist? Stuur ons een bericht en we komen er zo snel mogelijk bij je op terug.</p>

                    @if(session('success'))
                        <div class="alert alert-custom-success mb-4 p-3 d-flex align-items-center">
                            <span class="me-2">✓</span> {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-custom-error mb-4 p-3">
                            <ul class="margin-0 mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/contact">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label">Naam</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Jouw naam" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Email Adres</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="naam@voorbeeld.nl" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Onderwerp</label>
                            <input type="text" name="subject" value="{{ old('subject') }}" class="form-control" placeholder="Waar gaat het over?" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Bericht</label>
                            <textarea name="message" rows="6" class="form-control" placeholder="Type hier je bericht..." required>{{ old('message') }}</textarea>
                        </div>

                        <div class="d-grid d-md-flex justify-content-md-end">
                            <button type="submit" class="btn btn-primary-custom shadow-sm px-5">
                                Verstuur Bericht
                            </button>
                        </div>
                    </form>
                </div>

                <div class="text-center mt-4 opacity-50">
                    <a href="/" class="text-white text-decoration-none small">← Terug naar Home</a>
                </div>

            </div>
        </div>
    </div>
</x-base-layout>