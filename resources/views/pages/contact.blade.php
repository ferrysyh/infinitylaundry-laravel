@extends('layouts.template')

@section('title', 'Contact - INFINITY Laundry')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-between mt-5" id="kontak">
            <div class="col-md-2"></div>
            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center text-white" style="background-color: #58C2F1;">
                <img src="{{ asset("img/person/Ferry.jpg") }}" alt="Foto Ferry" height="150px">
                <p class="mt-2 mb-0"><b>Ferry Firmansyah<br>1303213036</b></p>
            </div>
            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center text-white" style="background-color: #58C2F1;">
                <img src="{{ asset("img/person/Zihni.jpeg") }}" alt="Foto Zihni" height="150px">
                <p class="mt-2 mb-0"><b>Zihni Nawfal Gusti F.<br>1303213071</b></p>
            </div>
            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center text-white" style="background-color: #58C2F1;">
                <img src="{{ asset("img/person/rizki.jpg") }}" alt="" height="150px">
                <p class="mt-2 mb-0" style="white-space: nowrap;"><b>Rizki Rana Kusumah<br>1303210002</b></p>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row justify-content-between mt-5" id="kontak">
            <div class="col-md-3"></div>
            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center text-white" style="background-color: #58C2F1;">
                <img src="{{ asset("img/person/Adam.jpg") }}" alt="" height="150px">
                <p class="mt-2 mb-0"><b>Adam Syam Nursal<br>1303210099</b></p>
            </div>
            <div class="col-md-2 text-center d-flex flex-column align-items-center justify-content-center text-white" style="background-color: #58C2F1;">
                <img src="{{ asset("img/person/alfi.jpg") }}" alt="" height="150px">
                <p class="mt-2 mb-0"><b>Alfi Hadi Maulana<br>1303210052</b></p>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
@endsection