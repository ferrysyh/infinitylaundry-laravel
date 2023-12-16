@extends('layouts.template')

@section('title', 'INFINITY Laundry')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container mt-4">
                    <h4 style="color: #0084F8;">Pilih tempat laundry favoritmu!<br>Dapatkan poin dan bonus dari tiap pesanan.</h4>
                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <input type="text" id="searchLaundry" class="form-control" placeholder="Cari Laundry">
                        </div>
                    </div>
                    <div class="row mt-4" id="laundryList">
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
    <script>
        $(document).ready(function () {
            $('#searchLaundry').on('keyup', function () {
                let searchTerm = $(this).val().toLowerCase();
                $('#laundryList .card').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -1);
                });
            });
        });
    </script>
@endsection