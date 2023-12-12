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
                    
                    <div class="row">
                        <div class="col-md-8">
                            <h3>Pilih Item Laundry</h3>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Kemeja</h5>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control item-quantity" aria-label="Jumlah item" aria-describedby="button-addon" min="1">
                                                <button class="btn btn-sm btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Kaos</h5>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control item-quantity" aria-label="Jumlah item" aria-describedby="button-addon" min="1">
                                                <button class="btn btn-sm btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <h5 class="card-title">Celana Panjang</h5>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control item-quantity" aria-label="Jumlah item" aria-describedby="button-addon" min="1">
                                                <button class="btn btn-sm btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="card mb-4" style="height: 80%;">
                                        <div class="card-body">
                                            <h5 class="card-title">Celana Pendek</h5>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control item-quantity" aria-label="Jumlah item" aria-describedby="button-addon"min="1">
                                                <button class="btn btn-sm btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4" style="height: 80%;">
                                        <div class="card-body">
                                            <h5 class="card-title">Handuk</h5>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control item-quantity" aria-label="Jumlah item" aria-describedby="button-addon" min="1">
                                                <button class="btn btn-sm btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card mb-4" style="height: 80%;">
                                        <div class="card-body">
                                            <input type="text" class="form-control item-name card-title">
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control item-quantity" aria-label="Jumlah item" aria-describedby="button-addon" min="1">
                                                <button class="btn btn-sm btn-primary btn-add-item" type="button" id="button-addon">Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card mb-4" style="height: 160px">
                                <div class="card-body">
                                    <h3>Item yang Dipilih</h3>
                                    <ul class="selected-items"></ul>
                                    <a href="confirm.php" class="btn btn-primary">Selesai</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".btn-add-item").click(function () {
                var cardBody = $(this).closest(".card-body");
                var itemName = cardBody.find(".card-title").text() || cardBody.find(".item-name").val();
                var itemQuantity = cardBody.find(".item-quantity").val();

                if (!itemName) {
                    alert("Mohon isikan nama item");
                    return;
                }else if (!itemQuantity) {
                    alert("Mohon isikan jumlah item");
                    return;
                }else if (itemQuantity <= 0){
                    alert("Jumlah item tidak valid");
                    return;
                }

                var itemHTML = "<li class='mb-1 list-group-item d-flex justify-content-between align-items-center'>" +
                    "<span>" + itemName + " : " + itemQuantity + "</span>" +
                    "<button class='btn btn-sm btn-danger btn-remove-item'>Hapus</button>" +
                    "</li>";
                $(".selected-items").append(itemHTML);
            });

            $(document).on("click", ".btn-remove-item", function () {
                $(this).closest("li").remove();
            });
        });
    </script>
@endsection
