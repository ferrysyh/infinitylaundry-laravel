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
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status</th>
                                <th>Nominal</th>
                                <th>Tempat</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $processedOrderIds = [];
                            @endphp
                    
                            @foreach ($transactionHistories->where('statuspembayaran', '!=', 'Selesai') as $history)
                                @php
                                    $currentTime = now();
                                    $createdAt = $history->created_at;
                                    $timeDifference = $currentTime->diffInHours($createdAt);
                                @endphp
                    
                                @if (!in_array($history->order_id, $processedOrderIds) && !($history->statuspembayaran == 'Menunggu pembayaran' && $timeDifference > 24))
                                    <tr>
                                        <td>{{ $history->order_id }}</td>
                                        <td>{{ $history->created_at->format('D, d M Y') }}</td>
                                        <td>{{ $history->statuspembayaran }}</td>
                                        <td>Rp {{ number_format($history->price, 2, ',', '.') }}</td>
                                        <td>{{ $history->laundry->name }}</td>
                                        <td>
                                            @if ($history->statuspembayaran == 'Menunggu pembayaran')
                                                <a href="/payment/{{ encrypt($history->order_id) }}" class="btn btn-sm btn-primary">Bayar</a>
                                            @endif
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
            </div>
        </main>
    </div>
</div>
@endsection