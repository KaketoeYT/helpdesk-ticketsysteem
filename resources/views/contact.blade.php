<x-base-layout>
    <div style="max-width:640px;margin:2rem auto;font-family:Arial,Helvetica,sans-serif">
        <h1>Contact</h1>

        @if(session('success'))
            <div style="padding:10px;border:1px solid #c3e6cb;background:#d4edda;color:#155724;margin-bottom:1rem">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div style="padding:10px;border:1px solid #f5c6cb;background:#f8d7da;color:#721c24;margin-bottom:1rem">
                <ul style="margin:0;padding-left:1.2rem">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/contact">
            @csrf
            <div style="margin-bottom:0.75rem">
                <label>Name</label><br>
                <input type="text" name="name" value="{{ old('name') }}" style="width:100%;padding:8px">
            </div>

            <div style="margin-bottom:0.75rem">
                <label>Email</label><br>
                <input type="email" name="email" value="{{ old('email') }}" style="width:100%;padding:8px">
            </div>

            <div style="margin-bottom:0.75rem">
                <label>Onderwerp</label><br>
                <input type="text" name="subject" value="{{ old('subject') }}" style="width:100%;padding:8px">
            </div>

            <div style="margin-bottom:0.75rem">
                <label>Bericht</label><br>
                <textarea name="message" rows="6" style="width:100%;padding:8px">{{ old('message') }}</textarea>
            </div>

            <div>
                <button type="submit" style="padding:8px 16px;background:#1a1a2e;color:#fff;border:none;border-radius:4px">Verstuur</button>
            </div>
        </form>
    </div>
</x-base-layout>
