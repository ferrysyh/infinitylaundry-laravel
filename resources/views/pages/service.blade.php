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
        <h2 class="mt-4 mb-4" style="color: #0084F8;"><b>LAYANAN KAMI</b></h2>
        <div class="row ps-5 pe-5">
            <div class="col-md-12">
                <p>Di INFINITY Laundry, kami memahami pentingnya layanan laundry yang efisien dan andal dalam kehidupan yang sibuk. Kami menawarkan berbagai layanan yang mencakup:</p>
                <ol>
                    <li><b>Cuci Reguler:</b></li>
                    Layanan ini mencakup pencucian pakaian sehari-hari seperti pakaian luar, baju dalam, handuk, dan linen rumah tangga. Kebersihan dan keamanan pakaian Anda adalah prioritas utama kami.
                    <li><b>Cuci Express:</b></li>
                    Untuk Anda yang membutuhkan pakaian dalam waktu singkat, layanan cuci kilat kami akan memastikan pakaian Anda siap digunakan dalam waktu cepat tanpa mengorbankan kualitas.
                    <li><b>Pengeringan:</b></li>
                    Layanan pengeringan kami menjadikan pakaian Anda kering dalam waktu singkat, siap untuk dipakai.
                    <li><b>Setrika:</b></li>
                    Pakaian yang rapi adalah kunci penampilan yang baik. Kami memberikan layanan setrika yang memastikan pakaian Anda tampak sempurna.
                    <li><b>Delivery dan Pick-Up:</b></li>
                    Kami memberikan layanan pengantaran dan penjemputan pakaian, memberikan Anda kenyamanan lebih.
                </ol>
                <br>
                <p>Kualitas terbaik dan layanan terbaik adalah prinsip yang kami pegang erat. Dengan teknologi terkini dan tim profesional kami, Anda dapat mempercayakan perawatan pakaian Anda kepada kami. Kebersihan dan keamanan pakaian Anda adalah prioritas kami. Dalam setiap penampilan, kami ingin Anda merasa tenang dan percaya diri.</p>
                <!-- <p>Kami adalah mitra terpercaya dalam merawat pakaian Anda. Terima kasih telah memilih INFINITY Laundry untuk layanan laundry terbaik.</p> -->
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