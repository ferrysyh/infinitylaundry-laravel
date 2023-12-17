@extends('layouts.template')

@section('title', 'INFINITY Laundry')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
@endsection

@section('content')
    <img src="{{ asset('img/mesinCuci.png') }}" alt="Mesin Cuci" style=" position: absolute; top: -50px; left: -30px; width: 20%;"/>
    <img src="{{ asset('img/baju.png') }}" alt="Mesin Cuci" style=" position: absolute; bottom: -90px; right: 390px; width: 20%;"/>
    <div class="row">
        <div class="col-md-8" id="kiri">
            <div class="container ms-4">
                <h2 id="typing-header" style="font-weight: bold"></h2>
                <p id="typing-paragraph"></p>
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
                        <div class="col-md-12 mt-4 d-flex justify-content-center align-items-center">
                            <p style=" position: absolute; bottom: 10px;">&copy; INFINITY Team</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    @include('layouts.loginform')
    @include('layouts.registform')

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/typing.js') }}"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
@endsection