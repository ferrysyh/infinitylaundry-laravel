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
                    <h4 style="color: #0084F8;">Pilih tempat laundry favoritmu!<br>Dapatkan poin dan bonus dari tiap pesanan.</h4>
                    {{-- <?php
                        include '../../config/laundrystore.php';
                    ?> --}}
                </div>
            </main>
        </div>
    </div>
@endsection