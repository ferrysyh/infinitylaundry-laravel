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
                <div class="container mt-4">
                    {{-- <?php include('../../config/selectedlaundry.php'); ?> --}}

                    <h3>Pilih Paket Laundry</h3>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Paket Reguler</h5>
                                    <p class="card-text">Estimasi Durasi: 3-4 hari</p>
                                    <p class="card-text">Harga: Rp 6.000/Kg</p>
                                    <a href="items.php" class="btn btn-primary">Pilih Paket</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Paket Express</h5>
                                    <p class="card-text">Estimasi Durasi: 2 hari</p>
                                    <p class="card-text">Harga: Rp 8.000/Kg</p>
                                    <a href="#" class="btn btn-primary">Pilih Paket</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Paket 1 Hari</h5>
                                    <p class="card-text">Estimasi Durasi: 1 hari</p>
                                    <p class="card-text">Harga: Rp 10.000/Kg</p>
                                    <a href="#" class="btn btn-primary">Pilih Paket</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection