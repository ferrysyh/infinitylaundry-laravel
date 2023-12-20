@extends('layouts.template')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container mt-4 text-left">
                <b style="color: #0084F8; font-size: 25px;">Metode Tarik Saldo</b>
            </div>
            <br>
            <div class="container mt-4 text-center">
                <b style="color: #0084F8; font-size: 25px;">Total Tarik Saldo</b>
            </div>
            <div class="container mt-4 text-center">
                <b style="color: #000000; font-size: 25px;">{{ $selectedValueCustomers }}</b>
            </div>
            <br>
            <br>

            <div class="row mt-4" style="display: flex; align-items: stretch;">

                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off">
                            <label class="btn btn-white" for="btnradio1" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <img src="{{ asset('img/bri.png') }}" alt="LogoBRI" width="100%">
                            </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                            <label class="btn btn-white" for="btnradio2" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <img src="{{ asset('img/bm.png') }}" alt="LogoBM" width="100%">
                            </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                            <label class="btn btn-white" for="btnradio3" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <img src="{{ asset('img/bca.png') }}" alt="LogoBCA" width="100%">
                            </label>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off">
                            <label class="btn btn-white" for="btnradio4" style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <img src="{{ asset('img/logoDANA.png') }}" alt="LogoDANA" width="100%">
                            </label>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>
            <br>
            <div class="container mt-4">
                <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8 text-center">
                    <div class="d-grid mx-auto">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">Konfirmasi</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Tarik Saldo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="name">Nama: {{ auth()->user()->name }}</label><br>
                        <label for="level">Level: {{ auth()->user()->level }}</label><br>
                        <label for="total">Total: Rp{{ number_format($selectedValueCustomers, 0,',','.') }}</label><br>
                        <label for="metode">Metode Pembayaran: </label>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('metodetariksaldo-proc') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                            <input type="hidden" name="balance" value="{{ $selectedValueCustomers }}">
                            <input type="hidden" name="metode" value="kurang">
                            <button type="submit" class="btn btn-primary">Lanjutkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </main>
    </div>
</div>
@endsection