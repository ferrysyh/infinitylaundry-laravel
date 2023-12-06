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
        <h2 class="mt-4 mb-4" style="color: #0084F8;"><b>TENTANG KAMI</b></h2>
        <div class="row ps-5 pe-5">
            <div class="col-md-12">
                <p>Selamat datang di INFINITY Laundry, layanan laundry yang melampaui batasan industri konvensional. Kami memahami bahwa dalam kehidupan yang semakin sibuk, mencuci pakaian menjadi tugas yang memakan waktu. Itulah mengapa kami hadir dengan solusi inovatif yang mengatasi masalah umum dalam industri laundry.</p>
                <br>
                <p>Di INFINITY Laundry, kami memiliki visi dan misi yang kuat:</p>
                <p><b>Visi:</b> Mengubah pengalaman pelanggan dalam mencuci pakaian, menjadikannya lebih praktis dan efisien.</p>
                <p><b>Misi:</b></p>
                <ol>
                    <li>Menyediakan layanan laundry yang tidak hanya membersihkan pakaian tetapi juga memberikan kepercayaan kepada pelanggan.</li>
                    <li>Mencegah kesalahan-kesalahan manusia yang umumnya terjadi dalam industri laundry konvensional, seperti pakaian yang hilang atau tertukar.</li>
                    <li>Menyediakan akses pelanggan ke status pakaian mereka secara real-time.</li>
                    <li>Membuat proses laundry lebih aman dan efisien.</li>
                </ol>
                <p>Di INFINITY Laundry, kami berkomitmen untuk memberikan layanan laundry yang lebih dari sekadar mencuci pakaian. Kami hadir untuk mengubah pengalaman Anda dalam merawat pakaian Anda, memberikan kepercayaan, dan menjaga integritas layanan laundry. Kami bangga menjadi bagian dari inovasi dalam industri laundry. Bersama-sama, mari kita menciptakan masa depan yang lebih bersih dan lebih nyaman. Terima kasih atas dukungan Anda.</p>
            </div>
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