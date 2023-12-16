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
                        <h2 style="color: #0084F8;">{{ $title }} Laundry</h2>
                    </div>
                    <div class="row justify-content-center mt-5">
                        <div class="col-5">
                            <h4></h4>
                            <form class="border" style="padding:20px" method="POST" action="/{{ $action }}">
                                @csrf
                                <input type="hidden" name="_method" value="{{ $method }}" />
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="name" class="form-control" value="{{ isset($laundry)?$laundry->name:'' }}" />
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="address" class="form-control" value="{{ isset($laundry)?$laundry->address:'' }}" />
                                </div>
                                <div class="form-group">
                                    <label>Rating</label>
                                    <input type="number" name="rating" class="form-control" value="{{ isset($laundry)?$laundry->rating:'' }}" />
                                </div>
                                <div class="form-group">
                                    <label>Image Path</label>
                                    <input type="text" name="img_path" class="form-control" value="{{ isset($laundry)?$laundry->img_path:'' }}" />
                                </div>
                                <div class="mt-4" style="text-align:center">
                                    <button class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>
@endsection