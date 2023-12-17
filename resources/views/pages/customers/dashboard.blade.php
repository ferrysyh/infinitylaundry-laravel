@extends('layouts.template')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container mt-4">
                <div class="row mt-4">
                <div class="col-md-6">
                    <h2 style="color: #0084F8;">Selamat Datang,<br> {{ auth()->user()->name }}</h2>
                </div>
                <div class="col-md-6" style="display: flex; justify-content: flex-end; align-items: center;">
                    <a href="{{ url('/order') }}" class="btn btn-success">+ Buat Pesanan</a>
                </div>
                <div class="row mt-4" style="display: flex; align-items: stretch;">
                    <div class="col-md-8">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-5">
                                        <h5 class="card-title">Saldo Anda</h5>
                                        <h4 class="card-text">Rp {{ number_format(auth()->user()->balance, 2, ',', '.') }}</h4>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="card-title">Level Member</h5>
                                        <h4 class="card-text">{{ auth()->user()->level }}</h4>
                                    </div>
                                    <div class="col-2">
                                        <h5 class="card-title">Poin</h5>
                                        <h4 class="card-text">{{ auth()->user()->poin }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <a href="{{ url('/tariksaldo_customers') }}" class="btn btn-white" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/tarikSaldo.png') }}" alt="Tarik Saldo" style="max-width: 30px; max-height: 50px;">
                                    <span style="white-space: nowrap;">Tarik Saldo</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <a href="{{ url('/topup') }}" class="btn btn-white" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/isiSaldo.png') }}" alt="Isi Saldo" style="max-width: 30px; max-height: 50px;">
                                    <span>Isi Saldo</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-5">
                    <h3>Pemesanan Berjalan</h3>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status</th>
                                <th>Nominal</th>
                                <th>Tempat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactionHistories->where('statuspembayaran', '!=', 'Selesai') as $history)
                                <tr>
                                    <td>{{ $history->order_id }}</td>
                                    <td>{{ $history->created_at->format('D, d M Y') }}</td>
                                    <td>{{$history->statuspembayaran }}</td>
                                    <td>Rp {{ number_format($history->price, 2, ',', '.') }}</td>
                                    <td>{{ $history->laundry->name }}</td>
                                    <td>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                        <button class="btn btn-primary me-md-2" type="button" data-toggle="modal" data-target='#myModal'>Laporan</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
                    aria-labelledby = "myModalLabel" aria-hidden = "true">
   
                        <div class = "modal-dialog">
                        <div class = "modal-content">
         
                        <div class = "modal-header">
                            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                            &times;
                            </button>
                        </div>
         
                        <div class = "modal-body">
                        <tr>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Laporan</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </tr>
                    </div>
         
                    <div class = "modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="acceptBtn">Accept</button>
                    </div>
                </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection