<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFINITY Laundry</title>
    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    {{-- <?php include('../component/navbar.php'); ?> --}}

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
                    <a class="nav-link ms-2" href="{{ url('/contact') }}">Kontak</a>
                    <a class="nav-link ms-2" href="{{ url('/about') }}">Tentang Kami</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-between mt-5" id="kontak">
            <div class="col-md-2"></div>
            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center text-white" style="background-color: #58C2F1;">
                <img src="{{ asset("img/person/Ferry.jpg") }}" alt="Foto Ferry" height="150px">
                <p class="mt-2 mb-0"><b>Ferry Firmansyah<br>1303213036</b></p>
            </div>
            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center text-white" style="background-color: #58C2F1;">
                <img src="{{ asset("img/person/Zihni.jpeg") }}" alt="Foto Zihni" height="150px">
                <p class="mt-2 mb-0"><b>Zihni Nawfal Gusti F.<br>1303213071</b></p>
            </div>
            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center text-white" style="background-color: #58C2F1;">
                <img src="" alt="" height="150px">
                <p class="mt-2 mb-0" style="white-space: nowrap;"><b>Rizki Rana Kusumah<br>1303210002</b></p>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row justify-content-between mt-5" id="kontak">
            <div class="col-md-3"></div>
            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center text-white" style="background-color: #58C2F1;">
                <img src="{{ asset("img/person/Adam.jpg") }}" alt="" height="150px">
                <p class="mt-2 mb-0"><b>Adam Syam Nursal<br>1303210099</b></p>
            </div>
            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center text-white" style="background-color: #58C2F1;">
                <img src="" alt="" height="150px">
                <p class="mt-2 mb-0"><b>Alfi Hadi Maulana<br>1303210052</b></p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <script src="./src/js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>

</html>