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
                <b style="color: #000000; font-size: 25px;">RP.100.000</b>
            </div>
            <br>
            <br>

            <div class="row mt-4" style="display: flex; align-items: stretch;">

                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <div>       
                        <button class="btn btn-white" class="btn active" data-bs-toggle="button" aria-pressed="true" 
                            style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <img src="{{ asset('img/bri.png') }}" alt="LogoBRI" width="100%">
                        </button>        
                    </div>
                </div>
                <div class="col-md-2">
                    <div>       
                        <button class="btn btn-white" class="btn active" data-bs-toggle="button" aria-pressed="true" 
                            style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/bm.png') }}" alt="LogoBM" width="100%">
                        </button>        
                    </div>
                </div>
                <div class="col-md-2">
                    <div>       
                        <button class="btn btn-white" class="btn active" data-bs-toggle="button" aria-pressed="true" 
                            style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/bca.png') }}" alt="LogoBM" width="100%">
                        </button>        
                    </div>
                </div>
                <div class="col-md-2">
                    <div style="height: 100%;">       
                        <button class="btn btn-white" class="btn active" data-bs-toggle="button" aria-pressed="true" 
                            style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <img src="{{ asset('img/tukarPoin.png') }}" alt="Tarik Saldo"
                                style="max-width: 30px; max-height: 50px;">
                                <span>Cash on Delivery</span>
                        </button>        
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
                            <button class="btn btn-primary" type="button">Konfirmasi & Bayar</button>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection