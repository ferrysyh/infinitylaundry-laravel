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
                </div>
                <div class="row mt-4" style="display: flex; align-items: stretch;">
                            <div class="col-md-4">
                                <div class="card" style="height: 100%;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                        <h5 class="card-title">Penghasilan Anda</h5>
                                        <h4 class="card-text">Rp {{ number_format(auth()->user()->balance, 2, ',', '.') }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                                <div class="card" style="height: 100%;">
                                    <div class="card-body">
                                        <h5 class="card-title">Rating Customer</h5>
                                        <canvas id="grafik-lingkaran" style="max-width: 100%; height: auto;"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card" style="height: 100%;">
                                    <div class="card-body">
                                        <a href="#" class="btn btn-white" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                            <span id="customer-count" style="font-size: 30px;">0</span>
                                            <span>Banyaknya Customer</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Penghasilan per Bulan</h5>
                                        <canvas id="grafik-batang" style="max-width: 100%; height: auto;"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <a href="#" class="btn btn-white" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/tarikSaldo.png') }}" alt="Tarik Saldo" style="max-width: 30px; max-height: 50px;">
                                    <span style="white-space: nowrap;">Tarik Saldo</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5">
                            <h3>Pesanan Masuk</h3>
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>No. Pesanan</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $processedOrderIds = [];
                                    @endphp
                                
                                    @foreach ($transactionHistories->where('statuspembayaran', '==', 'Menunggu pembayaran') as $history)
                                        @php
                                            $currentTime = now();
                                            $createdAt = $history->created_at;
                                            $timeDifference = $currentTime->diffInHours($createdAt);
                                        @endphp
                                
                                        @if ($timeDifference <= 24 && !in_array($history->order_id, $processedOrderIds))
                                            <tr>
                                                <td>{{ $history->order_id }}</td>
                                                <td>{{ $history->created_at->format('D, d M Y') }}</td>
                                                <td>{{ $history->statuspembayaran }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                                                        Detail
                                                    </button>
                                                </td>
                                            </tr>
                                            @php
                                                $processedOrderIds[] = $history->order_id;
                                            @endphp
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-5">
                                <h3>Pesanan Diproses</h3>
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>No. Pesanan</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactionHistories->where('statuspembayaran', '==', 'Sedang diproses') as $history)
                                        <tr>
                                            <td>{{ $history->order_id }}</td>
                                            <td>{{ $history->created_at->format('D, d M Y') }}</td>
                                            <td>{{$history->statuspembayaran }}</td>
                                            <td><button class = "btn btn-primary btn-sm" data-toggle = "modal" data-target = "#myModal">
                                            Detail
                                            </button>
                                        </tr>
                                        
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Modal -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            
            <h4 class = "modal-title" id = "myModalLabel">
               Detail pesanan
            </h4>
         </div>
         
         <div class = "modal-body">
         <tr>
                <th>No. Pesanan : {{ $history->order_id }}</th><br>
                <th>Tanggal Pemesanan : {{ $history->created_at->format('D, d M Y') }}</th><br>
                <th>Status : {{$history->statuspembayaran }}</th><br>
                <th>Biaya : Rp {{ number_format($history->price, 2, ',', '.') }}</th>
                <th></th>
        </tr>
         </div>
         
         <div class = "modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="acceptBtn">Accept</button>
                <button type="button" class="btn btn-danger" id="declineBtn">Decline</button>
        </div>
        </div>
         
      </div>
    </div>
  
    </div>
        </main>
    </div>
</div>
@endsection