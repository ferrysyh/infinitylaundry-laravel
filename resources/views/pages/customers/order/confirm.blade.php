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
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <div class="card-body">
                                            <img src="{{ asset($selectedLaundry->img_path) }}" class="card-img" alt="{{ $selectedLaundry->name }}" style="width: 100%;">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
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
                        </div>
                    
                        <div class="col-md-4">
                            <div class="card mb-4" style="height: 160px">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $selectedPackage->name }}</h5><br>
                                    <p class="card-text">Estimasi Durasi: {{ $selectedPackage->duration }} hari</p>
                                    <p class="card-text">Harga: Rp {{ number_format($selectedPackage->price, 0) }}/Kg</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-8">
                            <div class="card" style="height: 100%;">
                                <div class="card-body">
                                    <h4 class="card-title">Item yang Dipilih</h4>
                                    <ul class="list-group list-group-flush selected-items">
                                        @foreach ($laundryOrder->selectedLaundryItems as $selectedItem)
                                            <li class="list-group-item">
                                                {{ $selectedItem->name }} (Jumlah: {{ $selectedItem->quantity }})
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Berat dan Bayar</h4><br>
                                    <p class="card-text">Total Berat: {{ $totalWeight }} kg</p>
                                    <p class="card-text">Total Bayar: Rp {{ number_format($totalCost, 2, ',', '.') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <form method="post" action="{{ route('submit.confirmation') }}">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                <input type="hidden" name="laundry_id" value="{{ $selectedLaundry->id }}">
                                <input type="hidden" name="package_id" value="{{ $selectedPackage->id }}">
                                <input type="hidden" name="order_id" value="{{ $laundryOrder->id }}">
                                <input type="hidden" name="price" value="{{ $totalCost }}">
                            
                                <button type="submit" class="btn btn-primary" style="width: 100%;">Konfirmasi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection