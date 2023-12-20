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
                <b style="color: #0084F8; font-size: 25px;">Metode Pembayaran</b>
            </div>
            <br>
            <div class="container mt-4 text-center">
                <b style="color: #0084F8; font-size: 25px;">Total Pembayaran</b>
            </div>
            <div class="container mt-4 text-center">
                <b style="color: #000000; font-size: 25px;">Rp {{ number_format($transaction->price, 2, ',', '.') }}</b>
            </div>
            <br>
            <br>

            <div class="row mt-4" style="display: flex; align-items: stretch;">

                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
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
                                <img src="{{ asset('img/tukarPoin.png') }}" alt="LogoCod" width="50%">
                                <p>COD</p>
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
                            <form action="{{ route('payment-proc') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="price" value="{{ $transaction->price }}">
                                <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                <button type="submit" class="btn btn-primary">Konfirmasi & Bayar</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection