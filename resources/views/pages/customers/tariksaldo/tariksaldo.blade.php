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
            <div class="container mt-4">
                <h2 style="color: #0084F8;">Tarik Saldo</h2>
                <p style="color: #0084F8;">Silahkan Pilih Nominal</p>
                <form action="{{ route('metodetariksaldo') }}" method="post">
                    @csrf
                    <div class="row mt-4" style="display: flex; align-items: stretch;">

                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">
                            <div class="card" style="height: 100%;">

                                <input type="radio" class="btn-check" name="options-base" id="option1" autocomplete="off" value="10000">
                                <label class="btn" for="option1" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content:
                                center; align-items: center;">
                                    <img src="{{ asset('img/tukarPoin.png') }}" alt="Tarik Saldo"
                                        style="max-width: 30px; max-height: 50px;">
                                    <span style="white-space: nowrap;">Rp10.000</span>
                                    </button>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card" style="height: 100%;">

                                <input type="radio" class="btn-check" name="options-base" id="option2" autocomplete="off" value="20000">
                                <label class="btn" for="option2" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content:
                                center; align-items: center;">
                                    <img src="{{ asset('img/tukarPoin.png') }}" alt="Isi Saldo"
                                        style="max-width: 30px; max-height: 50px;">
                                    <span>Rp20.000</span>
                                    </button>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card" style="height: 100%;">

                                <input type="radio" class="btn-check" name="options-base" id="option3" autocomplete="off" value="50000">
                                <label class="btn" for="option3" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content:
                                center; align-items: center;">
                                    <img src="{{ asset('img/tukarPoin.png') }}" alt="Rp20.000"
                                        style="max-width: 30px; max-height: 50px;">
                                    <span>Rp50.000</span>
                                    </button>

                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="card" style="height: 100%;">

                                <input type="radio" class="btn-check" name="options-base" id="option4" autocomplete="off" value="100000">
                                <label class="btn" for="option4"
                                    style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/tukarPoin.png') }}" alt="Rp20.000"
                                        style="max-width: 30px; max-height: 50px;">
                                    <span>Rp100.000</span>
                                    </button>

                            </div>
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="row mt-4" style="display: flex; align-items: stretch;">

                        <div class="col-md-2">

                        </div>
                        <div class="col-md-2">
                            <div class="card" style="height: 100%;">

                                <input type="radio" class="btn-check" name="options-base" id="option5" autocomplete="off" value="150000">
                                <label class="btn" for="option5"
                                    style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/tukarPoin.png') }}" alt="Tarik Saldo"
                                        style="max-width: 30px; max-height: 50px;">
                                    <span style="white-space: nowrap;">Rp150.000</span>
                                    </button>

                            </div>
                        </div><br>
                        <div class="col-md-2">
                            <div class="card" style="height: 100%;">

                                <input type="radio" class="btn-check" name="options-base" id="option6" autocomplete="off" value="200000">
                                <label class="btn" for="option6"
                                    style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/tukarPoin.png') }}" alt="Tarik Saldo"
                                        style="max-width: 30px; max-height: 50px;">
                                    <span style="white-space: nowrap;">Rp200.000</span>
                                    </button>
                            </div>
                        </div><br>
                        <div class="col-md-2">
                            <div class="card" style="height: 100%;">

                                <input type="radio" class="btn-check" name="options-base" id="option7" autocomplete="off" value="500000">
                                <label class="btn" for="option7"
                                    style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/tukarPoin.png') }}" alt="Tarik Saldo"
                                        style="max-width: 30px; max-height: 50px;">
                                    <span style="white-space: nowrap;">Rp500.000</span>
                                    </button>
                            </div>
                        </div><br>
                        <div class="col-md-2">
                            <div class="card" style="height: 100%;">
                                <input type="radio" class="btn-check" name="options-base" id="option8" autocomplete="off" value="1000000">
                                <label class="btn" for="option8"
                                    style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/tukarPoin.png') }}" alt="Tarik Saldo"
                                        style="max-width: 30px; max-height: 50px;">
                                    <span style="white-space: nowrap;">Rp1.000.000</span>
                            </div>
                        </div>


                    </div>                          
                    
                    <div class="row mt-4" style="display: flex; align-items: stretch;">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6, text-center">
                            <button class="btn btn-primary" style="justify-content: center;">Konfirmasi & Pilih Metode Pembayaran</button>
                        </div>

                        <div class="col-md-3">

                        </div>
            </div>
        </main>
    </div>
</div>
@endsection