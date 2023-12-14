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
                                    <h2 style="color: #0084F8;">Isi Saldo</h2>
                    <p style="color: #0084F8;">Silahkan Pilih Nominal</p>
                    <div class="container">
        
                        <div class="row">
                            
                            <div class="col -md-2" id="row1col1">
                                <button type="button" class="btn btn-outline-primary btn-add-item" >Rp20.000</button>
                            </div>
                            <div class="col -md-2" id="row1col2">
                                <button type="button" class="btn btn-outline-primary btn-add-item" >Rp50.000</button>
                            </div>
                            <div class="col -md-4"></div>
                            <div class="col -md-4"></div>
                        </div><br>
                
                        <div class="row">
                            
                            <div class="col -md-6" id="row2col1">
                                <button type="button" class="btn btn-outline-primary btn-add-item" >Rp100.000</button>                            </div>
                            <div class="col -md-6" id="row2col2">
                                <button type="button" class="btn btn-outline-primary btn-add-item" >Rp150.000</button>                            </div>
                            <div class="col -md-4"></div>
                            <div class="col -md-4"></div>
                        </div><br>
                
                        <div class="row">
                            
                            <div class="col -md-6" id="row3col1">
                                <button type="button" class="btn btn-outline-primary btn-add-item" >Rp200.000</button>                            </div>
                            <div class="col -md-6" id="row3col2">
                                <button type="button" class="btn btn-outline-primary btn-add-item " >Rp300.000</button>                            </div>
                            <div class="col -md-4"></div>
                            <div class="col -md-4"></div>
                        </div><br>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control item-quantity" placeholder="Nominal lainnya" aria-label="Nominal lainnya" aria-describedby="button-addon">
                            <button class="btn btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                        </div>
                    </div><br>

                    <h3>Total</h3>
                    <ul class="selected-items"></ul>
                    <a href="#" class="btn btn-primary" >Konfirmasi & Pilih Metode Pembayaran</a>
            </div>
        </main>
    </div>
</div>
@endsection