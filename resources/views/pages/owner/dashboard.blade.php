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
                </div>
                <div class="row mt-4" style="display: flex; align-items: stretch;">
                    <div class="col-md-6">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">
                                        <h5 class="card-title">Penghasilan Anda</h5>
                                        <h4 class="card-text">Rp {{ number_format(auth()->user()->balance, 2, ',', '.') }}</h4>
                                    </div>
                                    <div class="col-md-5">
                                        <h5 class="card-title">Rating Laundry</h5>
                                        <h4 class="card-text">
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $laundry->rating)
                                                    <span class="text-warning">&#9733;</span>
                                                @else
                                                    <span class="text-warning">&#9734;</span>
                                                @endif
                                            @endfor
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="height: 220%;">
                            <div class="card-body">
                                <h6 class="card-title">Customer Bulan Ini</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card" style="height: 220%;">
                            <div class="card-body">
                                <h6 class="card-title">Penghasilan Bulan Ini</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-2">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <a href="#" class="btn btn-white" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/tarikSaldo.png') }}" alt="Tarik Saldo" style="max-width: 30px; max-height: 50px;">
                                    <span style="white-space: nowrap;">Tarik Saldo</span>
                                </a>
                            </div>
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
                                        <th>Nominal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $processedOrderIds = [];
                                    @endphp
                                
                                    @foreach ($transactionHistories->where('statuspembayaran', '==', 'Dibayar') as $history)
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
                                                <td>Rp {{ number_format($history->price, 2, ',', '.') }}</td>
                                                <td>
                                                    <form action="/change-status" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $history->order_id }}">
                                                        <input type="hidden" name="status" value="Sedang diproses">
                                                        <button type="submit" class="btn btn-sm btn-primary">Terima</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <form action="/change-status" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $history->order_id }}">
                                                        <input type="hidden" name="status" value="Ditolak">
                                                        <button type="submit" class="btn btn-sm btn-danger">Tolak</button>
                                                    </form>
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
                                            <th>Nominal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactionHistories->where('statuspembayaran', '==', 'Sedang diproses') as $history)
                                        <tr>
                                            <td>{{ $history->order_id }}</td>
                                            <td>{{ $history->created_at->format('D, d M Y') }}</td>
                                            <td>{{$history->statuspembayaran }}</td>
                                            <td>Rp {{ number_format($history->price, 2, ',', '.') }}</td>
                                            <td>
                                                <form action="/change-status" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $history->order_id }}">
                                                    <input type="hidden" name="status" value="Selesai">
                                                    <button type="submit" class="btn btn-sm btn-primary">Selesai</button>
                                                </form>
                                            </td>
                                        </tr>  
                                        @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection