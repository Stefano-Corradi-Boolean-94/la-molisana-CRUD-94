<header class="text-center">
    <img class="my-3" src="/img/logo-molisana.png" alt="Logo La Molisana">
    {{-- <img class="my-3" src="{{ Vite::asset('resources/img/logo-molisana.png') }}" alt="Logo La Molisana"> --}}
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pastas.index') }}">Elenco Prodotti</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('pastas.create') }}">Nuovo prodotto (pasta)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contacts') }}">Contatti</a>
        </li>
    </ul>
</header>
