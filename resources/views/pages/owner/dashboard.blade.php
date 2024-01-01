@extends('layouts.template')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <a href="{{ url('/tariksaldo_customers') }}" class="btn btn-white" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/tarikSaldo.png') }}" alt="Tarik Saldo" style="max-width: 30px; max-height: 50px;">
                                    <span style="white-space: nowrap;">Tarik Penghasilan</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">Statistik Orderan</h5><br>
                                <canvas id="customerCountChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">Statistik Penghasilan</h5><br>
                                <canvas id="totalEarningsChart" width="400" height="200"></canvas>
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
                                        <th>Paket</th>
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
                                                <td>{{ $history->package->name }}</td>
                                                <td>
                                                    <form action="/change-status" method="post" style="display: inline-block;">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $history->order_id }}">
                                                        <input type="hidden" name="status" value="Sedang diproses">
                                                        <button type="submit" class="btn btn-sm btn-primary">Terima</button>
                                                    </form>
                                                    <form action="/change-status" method="post" style="display: inline-block;">
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
                                            <th>Paket</th>
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
                                            <td>{{ $history->package->name }}</td>
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
<script>
    var months = ['Bulan Lalu', 'Bulan Kemarin', 'Bulan Ini'];
    var customerCounts = [{{ $customerCountLastLast }}, {{ $customerCountLast }}, {{ $customerCountCurrent }}];
    var totalEarnings = [{{ $totalEarningsLastLast }}, {{ $totalEarningsLast }}, {{ $totalEarningsCurrent}}];

    var ctxCustomerCount = document.getElementById('customerCountChart').getContext('2d');
    var customerCountChart = new Chart(ctxCustomerCount, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Order Count',
                data: customerCounts,
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        callback: function(value) {
                            return value.toFixed(0);
                        }
                    }
                }
            }
        }
    });

    var ctxTotalEarnings = document.getElementById('totalEarningsChart').getContext('2d');
    var totalEarningsChart = new Chart(ctxTotalEarnings, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Total Earnings',
                data: totalEarnings,
                backgroundColor: 'rgba(255, 99, 132, 0.5)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection