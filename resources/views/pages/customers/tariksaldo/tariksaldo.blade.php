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
                <div class="row mt-4" style="display: flex; align-items: stretch;">

                    <div class="col-md-2">

                    </div>
                    <div class="col-md-2">
                        <div class="card" style="height: 100%;">
                            <input type="radio" class="btn-check" name="options-base" id="option1" autocomplete="off">
                            <label class="btn" for="option1"
                            style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/tukarPoin.png') }}" alt="Tarik Saldo"
                                style="max-width: 30px; max-height: 50px;">
                            <span style="white-space: nowrap;">Rp10.000</span>                           
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card" style="height: 100%;">
                            
                            <input type="radio" class="btn-check" name="options-base" id="option2" autocomplete="off">
                            <label class="btn" for="option2"
                            style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/tukarPoin.png') }}" alt="Isi Saldo"
                                style="max-width: 30px; max-height: 50px;">
                            <span>Rp20.000</span>
                                                           
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card" style="height: 100%;">
                            
                            <input type="radio" class="btn-check" name="options-base" id="option3" autocomplete="off">
                            <label class="btn" for="option3"
                            style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/tukarPoin.png') }}" alt="Rp20.000"
                                style="max-width: 30px; max-height: 50px;">
                            <span>Rp50.000</span>
                                                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card" style="height: 100%;">
                            
                            <input type="radio" class="btn-check" name="options-base" id="option4" autocomplete="off">
                            <label class="btn" for="option4"
                            style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/tukarPoin.png') }}" alt="Rp20.000"
                                style="max-width: 30px; max-height: 50px;">
                            <span>Rp100.000</span>
                                                            
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
                            
                            <input type="radio" class="btn-check" name="options-base" id="option5" autocomplete="off">
                            <label class="btn" for="option5"
                            style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/tukarPoin.png') }}" alt="Tarik Saldo"
                                style="max-width: 30px; max-height: 50px;">
                            <span style="white-space: nowrap;">Rp150.000</span>
                                                            
                        </div>
                    </div><br>
                    <div class="col-md-2">
                        <div class="card" style="height: 100%;">
                            
                            <input type="radio" class="btn-check" name="options-base" id="option6" autocomplete="off">
                            <label class="btn" for="option6"
                            style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/tukarPoin.png') }}" alt="Tarik Saldo"
                                style="max-width: 30px; max-height: 50px;">
                            <span style="white-space: nowrap;">Rp200.000</span>
                                
                        </div>
                    </div><br>
                    <div class="col-md-2">
                        <div class="card" style="height: 100%;">
                            
                            <input type="radio" class="btn-check" name="options-base" id="option7" autocomplete="off">
                            <label class="btn" for="option7"
                            style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/tukarPoin.png') }}" alt="Tarik Saldo"
                                style="max-width: 30px; max-height: 50px;">
                            <span style="white-space: nowrap;">Rp500.000</span>
                                
                        </div>
                    </div><br>
                    <div class="col-md-2" >
                        <div class="card" style="height: 100%;">
                            <input type="radio" class="btn-check" name="options-base" id="option8" autocomplete="off">
                            <label class="btn" for="option8"
                            style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="{{ asset('img/tukarPoin.png') }}" alt="Tarik Saldo"
                                style="max-width: 30px; max-height: 50px;">
                            <span style="white-space: nowrap;">Rp1.000.000</span>
                        </div>
                    </div>
                    

                </div>
                <div class="row mt-4" style="display: flex; align-items: stretch;">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Nominal Lainnya</span>
                            <input type="text" placeholder="Rp0" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                        </div>
                    </div>
                    <div class="col-md-2">
                        
                    </div>
                    
                </div>


                <h3>Total</h3>
                <button type="button" class="btn btn-primary" disabled data-bs-toggle="button">Selanjutnya                              
            </div>
        </main>
    </div>
</div>
@endsection