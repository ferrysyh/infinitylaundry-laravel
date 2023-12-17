<nav class="navbar navbar-expand-lg sticky-top" id="navbar">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ url('/') }}">
            <img src="{{ asset('img/Logo.png') }}" alt="Logo INFINITY Laundry" height="25px" class="d-inline-block align-text-top">
            <b>INFINITY</b> Laundry
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-auto">
                <a class="nav-link ms-2" aria-current="page" href="{{ url('/') }}">Beranda</a>
                <a class="nav-link ms-2" href="{{ url('/service') }}">Layanan</a>
                <a class="nav-link ms-2" href="{{ url('/contact') }}">Team</a>
                <a class="nav-link ms-2" href="{{ url('/about') }}">Tentang</a>
            </div>
        </div>
    </div>
</nav>