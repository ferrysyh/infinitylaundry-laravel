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
                    <div class="card mb-4">
                        <div class="row no-gutters">
                            <div class="col-md-3">
                                <div class="card-body">
                                    <img src="{{ asset($selectedLaundry->img_path) }}" class="card-img" alt="{{ $selectedLaundry->name }}" style="width: 100%;">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <h2 class="card-title">{{ $selectedLaundry->name }}</h2>
                                    <p class="card-text">Alamat: {{ $selectedLaundry->address }}</p>
                                    <p>Rating: 
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $selectedLaundry->rating)
                                                <span class="text-warning">&#9733;</span>
                                            @else
                                                <span class="text-warning">&#9734;</span>
                                            @endif
                                        @endfor
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h3>Pilih Paket Laundry</h3>
                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                            <input type="text" id="searchPackage" class="form-control" placeholder="Cari Paket">
                        </div>
                    </div>
                    <div class="row mt-4" id="packageList">
                        @forelse ($selectedLaundry->packages as $package)
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $package->name }}</h5>
                                        <p class="card-text">Estimasi Durasi: {{ $package->duration }} hari</p>
                                        <p class="card-text">Harga: Rp {{ number_format($package->price, 0) }}/Kg</p>
                                        <a href="{{ route('items', ['laundryId' => encrypt($selectedLaundry->id), 'packageId' => encrypt($package->id)]) }}" class="btn btn-primary" style="width: 100%;">Pilih Paket</a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Tidak ada paket yang tersedia untuk laundry ini.</p>
                        @endforelse
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#searchPackage').on('keyup', function () {
                let searchTerm = $(this).val().toLowerCase();
                $('#packageList .card').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(searchTerm) > -1);
                });
            });
        });
    </script>
@endsection