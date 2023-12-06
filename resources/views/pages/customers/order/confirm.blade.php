@extends('layouts.template')

@section('title', 'INFINITY Laundry')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}" />
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container">
                    <div class="row mt-4">
                        <div class="col-md-8">
                            <div class="card" style="height: 100%;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ asset("\img\laundrystore\starlaudry.jpg") }}" alt="Laundry 1" class="img-fluid">
                                        </div>
                                        <div class="col-md-8">
                                            <h5 class="card-text">Star Laundry</h5>
                                            <p class="card-text">Alamat: Jalan Sukapura No. 123</p>
                                            <p class="card-text">Rating: <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card" style="height: 100%;">
                                <div class="card-body">
                                    <h4 class="card-title">Paket yang Dipilih</h4><br>
                                    <p class="card-text">Paket Reguler<br>(Estimasi Durasi: 3-4 hari)</p>
                                    <p class="card-text">Harga: Rp 6.000/Kg</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-8">
                            <div class="card" style="height: 100%;">
                                <div class="card-body">
                                    <h4 class="card-title">Item yang Dipilih</h4>
                                    <ul class="list-group list-group-flush selected-items">
                                        <li class="list-group-item">Item A (Jumlah: 3)</li>
                                        <li class="list-group-item">Item B (Jumlah: 2)</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card" style="height: 100%;">
                                <div class="card-body">
                                    <h4 class="card-title">Total Berat dan Bayar</h4><br>
                                    <p class="card-text">Total Berat: 7 kg</p>
                                    <p class="card-text">Total Bayar: Rp 42.000</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card" style="height: 100%;">
                                <a href="metodepembayaran.html" class="btn btn-primary">Konfirmasi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection