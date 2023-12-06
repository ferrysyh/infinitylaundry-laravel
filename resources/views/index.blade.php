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
    <nav class="navbar navbar-expand-lg sticky-top" id="navbar">
        <div class="container">
            <a class="navbar-brand text-white" href="../../index.php">
                <img src="{{ asset('img/Logo.png') }}" alt="Logo INFINITY Laundry" height="25px" class="d-inline-block align-text-top">
                <b>INFINITY</b> Laundry
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link ms-2" aria-current="page" href="../../index.php">Beranda</a>
                    <a class="nav-link ms-2" href="../../pages/service.php">Layanan</a>
                    <a class="nav-link ms-2" href="../../pages/contact.php">Kontak</a>
                    <a class="nav-link ms-2" href="../../pages/about.php">Tentang Kami</a>
                </div>
            </div>
        </div>
    </nav>
    <div class="row">
        <div class="col-md-8" id="kiri">
            <div class="container ms-4">
                <h2><b>MENCUCI PAKAIAN DENGAN CINTA<br>DAN KEPEDULIAN</b></h2>
                <p>Kami Merubah Pengalaman Anda Menjadi Lebih Praktis, Efisien, dan Penuh Kepercayaan.</p>
            </div>
        </div>
        <div class="col-md-4" id="kanan">
            <div class="container d-flex flex-column justify-content-center align-items-center text-white">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h1>Selamat Datang</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn ps-5 pe-5 text-white" id="tombol-masuk">Masuk</button>
                        <button type="button" class="btn ps-5 pe-5 text-white" id="tombol-daftar">Daftar</button>
                    </div>
                </div>
                <footer class="container-fluid text-center" id="footer">
                    <div class="row">
                        <div class="col-md-12 mt-4">
                            <p>&copy; INFINITY Team</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    {{-- <?php include('component/loginform.php'); ?> --}}
    {{-- <?php include('component/registform.php'); ?> --}}

    <script src="src/js/index.js"></script>
    <script src="src/js/alert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</body>
</html>