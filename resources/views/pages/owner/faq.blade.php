@extends('layouts.template')

@section('title', 'Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/customers.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/faq.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
@endsection


@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container mt-4">
                    <section>
                        <h1 class="title">Frequently Asked Questions</h1><br>
                    
                        <div class="questions-container">
                    
                            <div class="question">
                                <button>
                                    <span>Bagaimana cara mendaftar sebagai mitra laundry di aplikasi ini?</span>
                                    <i class="fas fa-chevron-down d-arrow"></i>
                                </button>
                                <p>Untuk mendaftar sebagai mitra laundry, Anda dapat mendaftar sebagai "Owner" di aplikasi kami.</p>
                            </div>
                    
                            <div class="question">
                                <button>
                                    <span>Bagaimana sistem penjadwalan pengambilan dan pengantaran cucian bekerja di aplikasi kami?</span>
                                    <i class="fas fa-chevron-down d-arrow"></i>
                                </button>
                                <p>Sistem kami menggunakan algoritma cerdas untuk mengoptimalkan jadwal pengambilan dan pengantaran berdasarkan lokasi dan waktu yang dipilih oleh pengguna. Mitra laundry akan menerima pemberitahuan untuk setiap pesanan baru.</p>
                            </div>
                    
                            <div class="question">
                                <button>
                                    <span>Apa jenis dukungan yang diberikan kepada mitra laundry?</span>
                                    <i class="fas fa-chevron-down d-arrow"></i>
                                </button>
                                <p>Kami menyediakan dukungan pelanggan dan teknis 24/7 bagi mitra laundry kami.</p>
                            </div>

                            <div class="question">
                                <button>
                                    <span>Bagaimana sistem penilaian dan umpan balik bekerja di aplikasi ini?</span>
                                    <i class="fas fa-chevron-down d-arrow"></i>
                                </button>
                                <p> Setelah setiap transaksi selesai, pengguna dapat memberikan penilaian dan ulasan. Mitra laundry yang memberikan layanan berkualitas tinggi akan menerima ulasan positif yang dapat meningkatkan visibilitas mereka di aplikasi.</p>
                            </div>

                            <div class="question">
                                <button>
                                    <span>Bagaimana pengelolaan masalah atau keluhan pelanggan diatasi?</span>
                                    <i class="fas fa-chevron-down d-arrow"></i>
                                </button>
                                <p>Kami memiliki tim layanan pelanggan yang siap membantu menangani masalah atau keluhan pelanggan. Mitra laundry juga dapat menghubungi kami untuk bantuan jika mereka menghadapi masalah teknis atau operasional.</p>
                            </div>

                        </div>
                    </section>
                </div>
            </main>
    </div>
</div>

<script src="{{ asset('js/faq.js') }}"></script>
@endsection