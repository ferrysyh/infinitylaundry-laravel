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
                    <h2 style="color: #0084F8;">Selamat Datang,<br>{{ auth()->user()->name }}</h2>
                </div>
                {{-- <div class="row mt-4" style="display: flex; align-items: stretch;">
                    
                </div> --}}
                
                <div class="mt-5">
                    <h3>Toko Laundry</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Rating</th>
                                <th>IMG Path</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laundry as $laundry)
                                <tr>
                                    <td>{{ $laundry->id }}</td>
                                    <td>{{ $laundry->name }}</td>
                                    <td>{{$laundry->address }}</td>
                                    <td>{{$laundry->rating }}</td>
                                    <td>{{$laundry->img_path }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-5">
                    <h3>Paket Laundry</h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Durasi</th>
                                <th>Harga</th>
                                <th>Laundry</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($package as $package)
                                <tr>
                                    <td>{{ $package->id }}</td>
                                    <td>{{ $package->name }}</td>
                                    <td>{{$package->duration }}</td>
                                    <td>{{$package->price }}</td>
                                    <td>{{$package->laundry_id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection