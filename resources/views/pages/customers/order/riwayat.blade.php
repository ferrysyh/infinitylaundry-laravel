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
                <b style="color: #0084F8;font-size: 25px;">Riwayat Pesanan</b>
                <br>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. Pesanan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Status</th>
                            <th>Nominal</th>
                            <th>Paket</th>
                            <th>Tempat</th>
                        </tr>
                    </thead>
                    <tbody>
                            @forelse ($transactionHistories->whereIn('statuspembayaran', ['Selesai', 'Ditolak']) as $history)
                                <tr>
                                    <td>{{ $history->order_id }}</td>
                                    <td>{{ $history->created_at->format('D, d M Y') }}</td>
                                    <td>{{ $history->statuspembayaran }}</td>
                                    <td>Rp {{ number_format($history->price, 2, ',', '.') }}</td>
                                    <td>{{ $history->package->name }}</td>
                                    <td>{{ $history->laundry->name }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">Anda belum memiliki riwayat pesanan.</td>
                                </tr>
                            @endforelse
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection