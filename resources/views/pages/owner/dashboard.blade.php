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
                <div class="row mt-4" style="display: flex; align-items: stretch;">
                    <div class="col-md-6">
                        <div class="card" style="height: 100%;">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="card-title">Saldo Anda</h5>
                                        <h4 class="card-text">Rp {{ number_format(auth()->user()->balance, 2, ',', '.') }}</h4>
                                    </div>
                                    <div class="col-5">
                                        <h5 class="card-title">Level Member</h5>
                                        <h4 class="card-text">{{ auth()->user()->level }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection