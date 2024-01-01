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
                <br>
                <div class="mb-3">
                    <div class="container col-4 mx-auto">
                        <label for="tahunDropdown" class="form-label">Pilih Tahun:</label>
                        <select class="form-select" id="tahunDropdown" onchange="pilih()">
                            <option value="" disabled selected>--Pilih tahun--</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>
                <br>
                <table class="table" id="laporanTable">
                    <thead>
                        <tr>
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th>Orderan</th>
                            <th>Pemasukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ordersByMonth as $month => $orders)
                            <tr id="noDataMessage" style="display: none;">
                                <td class="text-center" colspan="4">Tidak ada data.</td>
                            </tr>
                            <tr data-date="{{ $month }}" data-price="Rp {{ number_format($orders->sum('price'), '2', ',', '.') }}" data-order="{{ $orders->count() }} Customer" style="display: none;">
                                <td><div class="tahun"></div></td>
                                <td><div class="bulan"></div></td>
                                <td><div class="order"></div></td>
                                <td><div class="price"></div></td>
                            </tr>                            
                        @endforeach
                    </tbody>                    
                </table>
            </div>
        </main>
    </div>
</div>

<script>
    function pilih() {
        var selectedYear = document.getElementById('tahunDropdown').value;

        var rows = document.querySelectorAll('#laporanTable tbody tr');

        var noDataMessage = document.getElementById('noDataMessage');

        var hasData = false;

        rows.forEach(function (row) {
            var date = new Date(row.getAttribute('data-date'));
            var year = date.getFullYear();
            var monthNames = ["Januari", "Februari", "Maret", "April", "May", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            var month = monthNames[date.getMonth()];

            if (year == selectedYear) {
                row.style.display = 'table-row';
                row.querySelector('.tahun').textContent = year;
                row.querySelector('.bulan').textContent = month;
                row.querySelector('.price').textContent = row.getAttribute('data-price');
                row.querySelector('.order').textContent = row.getAttribute('data-order');

                hasData = true;
            } else {
                row.style.display = 'none';
            }
        });

        noDataMessage.style.display = hasData ? 'none' : 'table-row';
    }
</script>
@endsection