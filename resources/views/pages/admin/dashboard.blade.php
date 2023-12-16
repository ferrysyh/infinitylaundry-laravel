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
                
                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-10">
                            <h3>Toko Laundry</h3>
                        </div>
                        <div class="col-md-2">
                            <a href="/laundry/create" class="btn btn-sm btn-success">Tambah Data</a>
                        </div>
                    </div>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Rating</th>
                                <th>Image Path</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laundry as $laundry)
                                <tr>
                                    <td>{{ $laundry->id }}</td>
                                    <td>{{ $laundry->name }}</td>
                                    <td>{{$laundry->address }}</td>
                                    <td>
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $laundry->rating)
                                                <span class="text-warning">&#9733;</span>
                                            @else
                                                <span class="text-warning">&#9734;</span>
                                            @endif
                                        @endfor
                                    </td>
                                    <td>{{$laundry->img_path }}</td>
                                    <td>
                                        <a href="/laundry/{{ $laundry->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                                        <form method="post" action="/laundry/{{ $laundry->id }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-5">
                    <div class="row">
                        <div class="col-md-10">
                            <h3>Paket Laundry</h3>
                        </div>
                        <div class="col-md-2">
                            <a href="/paket/create" class="btn btn-sm btn-success">Tambah Data</a>
                        </div>
                    </div>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Durasi</th>
                                <th>Harga</th>
                                <th>Laundry ID</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($package as $package)
                                <tr>
                                    <td>{{ $package->id }}</td>
                                    <td>{{ $package->name }}</td>
                                    <td>{{ $package->duration }} Hari</td>
                                    <td>Rp {{ number_format($package->price, 0, ',', '.') }}</td>
                                    <td>{{ $package->laundry_id }}</td>
                                    <td>
                                        <a href="/package/{{ $package->id }}/edit" class="btn btn-sm btn-primary">Edit</a>
                                        <form method="post" action="/package/{{ $package->id }}" style="display:inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
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