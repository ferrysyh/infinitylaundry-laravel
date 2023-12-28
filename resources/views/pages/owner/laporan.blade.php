@extends('layouts.template')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <script src="{{ asset('js/laporan.js') }}"></script>
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="container mt-4">
                <b style="color: #0084F8;font-size: 25px;">Laporan Bulanan {{ $laporan[0]['created_at'] }}</b>
                <br>
                <br>
                <div class="mb-3">
                    <div class="container col-4 mx-auto">
                        <label for="tahunDropdown" class="form-label">Pilih Tahun:</label>
                        <select class="form-select" id="tahunDropdown" onchange="pilih()">
                            <!-- Isi Dropdown dengan Tahun -->
                            <!-- Contoh: -->
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                            <!-- Tambahkan opsi tahun sesuai kebutuhan -->
                        </select>
                        <br>
                        <label for="bulanDropdown" class="form-label">Pilih Bulan:</label>
                        <select class="form-select" id="bulanDropdown" onchange="pilih()">
                            <!-- Isi Dropdown dengan Tahun -->
                            <!-- Contoh: -->
                            <option value="1">januari</option>
                            <option value="2">februari</option>
                            <option value="3">maret</option>
                            <option value="4">april</option>
                            <option value="5">may</option>
                            <option value="6">juni</option>
                            <option value="7">juli</option>
                            <option value="8">agustus</option>
                            <option value="9">september</option>
                            <option value="10">oktober</option>
                            <option value="11">november</option>
                            <option value="12">desember</option>
                            <!-- Tambahkan opsi tahun sesuai kebutuhan -->
                        </select>
                    </div>
                </div>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th>Pemasukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($laporan->where('statuspembayaran', '==', 'Menunggu pembayaran') as $history)
                            <td>
                                <div data-date = "{{ $history->created_at}}"></div>
                                <div data-price= "{{$history->price}}"></div>
                                <td><div id="tahun" ></div></td>
                                <td><div id="bulan"></div></td>
                                <td><div id="price"></div></td>
                        </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection