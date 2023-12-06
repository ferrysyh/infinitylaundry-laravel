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
                    <div class="card mb-4">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <div class="card-body">
                                    <img src="{{ asset("\img\laundrystore\starlaudry.jpg") }}" class="card-img" alt="Laundry 1" style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h2 class="card-title">Star Laundry</h2>
                                    <p class="card-text">Alamat: Jalan Sukapura No. 123</p>
                                    <p class="card-text">Rating: <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>Pilih Item Laundry</h3>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Kemeja</h5>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control item-quantity" placeholder="Jumlah item" aria-label="Jumlah item" aria-describedby="button-addon">
                                        <button class="btn btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Kaos</h5>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control item-quantity" placeholder="Jumlah item" aria-label="Jumlah item" aria-describedby="button-addon">
                                        <button class="btn btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">Celana Panjang</h5>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control item-quantity" placeholder="Jumlah item" aria-label="Jumlah item" aria-describedby="button-addon">
                                        <button class="btn btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card mb-4" style="height: 80%;">
                                <div class="card-body">
                                    <h5 class="card-title">Celana Pendek</h5>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control item-quantity" placeholder="Jumlah item" aria-label="Jumlah item" aria-describedby="button-addon">
                                        <button class="btn btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4" style="height: 80%;">
                                <div class="card-body">
                                    <h5 class="card-title">Handuk</h5>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control item-quantity" placeholder="Jumlah item" aria-label="Jumlah item" aria-describedby="button-addon">
                                        <button class="btn btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4" style="height: 80%;">
                                <div class="card-body">
                                    <input type="text" class="form-control item-name card-title" placeholder="Nama item baru">
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control item-quantity" placeholder="Jumlah item" aria-label="Jumlah item" aria-describedby="button-addon">
                                        <button class="btn btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3>Item yang Dipilih</h3>
                    <ul class="selected-items"></ul>
                    <a href="confirm.php" class="btn btn-primary">Selesai</a>
                </div>
            </main>
        </div>
    </div>
@endsection