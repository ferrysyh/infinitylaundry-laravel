<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="{{ url('/dashboard') }}">Dashboard</a>
            </li>
            @if (auth()->user()->role == 'customer')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/riwayat') }}">Riwayat Pesanan</a>
            </li>
            @endif
            @if (auth()->user()->role == 'owner')
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/laporan') }}">Laporan</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/faq') }}">Bantuan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-danger" href="logout">Logout</a>
            </li>
        </ul>
    </div>
</nav>