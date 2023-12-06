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
                <div class="row mt-4">
                <div class="col-md-6">
                    <h2 style="color: #0084F8;">Selamat Datang,<br> Ini Contoh</h2>
                    {{-- <h2 style="color: #0084F8;">Selamat Datang,<br> <?php echo $name; ?></h2> --}}
                </div>
                <div class="col-md-6" style="display: flex; justify-content: flex-end; align-items: center;">
                    <a href="order/laundry.php" class="btn btn-success">+ Buat Pesanan</a>
                </div>
                <div class="row mt-4" style="display: flex; align-items: stretch;">
                    <div class="col-md-6">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="card-title">Saldo Anda</h5>
                                        <h4 class="card-text">Rp 100.000</h4>
                                        {{-- <h4 class="card-text">Rp <?php echo number_format($balance); ?></h4> --}}
                                    </div>
                                    <div class="col-6">
                                        <h5 class="card-title">Level Member</h5>
                                        <h4 class="card-text">Platinum</h4>
                                        {{-- <h4 class="card-text"><?php echo $level_member; ?></h4> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="col-md-2">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <a href="balance/topup.html" class="btn btn-white" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/isiSaldo.png') }}" alt="Isi Saldo" style="max-width: 30px; max-height: 50px;">
                                    <span>Isi Saldo</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <a href="#" class="btn btn-white" style="width: 100%; height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="{{ asset('img/tukarPoin.png') }}" alt="Tukar Poin" style="max-width: 30px; max-height: 50px;">
                                    <span>Tukar Poin</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-5">
                    <h3>Riwayat Pemesanan</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No. Pesanan</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12345</td>
                                <td>2023-10-20</td>
                                <td>Dalam Proses</td>
                            </tr>
                            <tr>
                                <td>12346</td>
                                <td>2023-10-18</td>
                                <td>Bisa Dijemput</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection