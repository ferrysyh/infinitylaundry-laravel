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
                    <div class="row mt-4">
                        @forelse($laundries as $laundry)
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <img src="{{ asset($laundry->img_path) }}" class="card-img-top" alt="{{ $laundry->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $laundry->name }}</h5>
                                        <p class="card-text">Alamat: {{ $laundry->address }}</p>
                                        <p class="card-text">Rating:
                                            @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $laundry->rating)
                                                    <span class="text-warning">&#9733;</span>
                                                @else
                                                    <span class="text-warning">&#9734;</span>
                                                @endif
                                            @endfor
                                        </p>
                                        <a href="{{ route('package', ['id' => encrypt($laundry->id)]) }}" class="btn btn-primary" style="width: 100%;">Pilih Laundry</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Tidak ada data laundry yang ditemukan.</p>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection