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
                <table class="table">
                    <thead>
                        <tr>
                            <th>No. Pesanan</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Status</th>
                            <th>Tempat</th>
                            <th>Nominal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactionHistories as $history)
                                <tr>
                                    <td>{{ $history->order_id }}</td>
                                    <td>{{ $history->created_at->format('D, d M Y') }}</td>
                                    <td>{{ $history->statuspembayaran }}</td>
                                    <td><a href="" style="text-decoration: none">Details</a></td>
                                    <td>Rp {{ number_format($history->price, 2, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection