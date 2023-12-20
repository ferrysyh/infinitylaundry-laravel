@extends('layouts.template')

@section('title', 'Successful')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}" />
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="row justify-content-center" style="margin-top:18%">
                <div class="row">
                <div class="col-md-2"></div>
                    <div class="col-md-8 text-center">
                        <div class="d-grid mx-auto">
                            <h2 style="color: #0084F8;">Isi Saldo Telah Berhasil!</h2>
                            <a class="btn btn-primary" type="button" href="{{ url('/dashboard') }}">Kembali ke Dashboard</a>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection