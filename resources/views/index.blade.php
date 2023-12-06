@extends('layouts.template')

@section('title', 'INFINITY Laundry')

@section('content')
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

    @include('layouts.loginform')
    @include('layouts.registform')
    
@endsection