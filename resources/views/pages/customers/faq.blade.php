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
                                    <span>Bagaimana cara menggunakan aplikasi ini untuk memesan layanan laundry?</span>
                                    <i class="fas fa-chevron-down d-arrow"></i>
                                </button>
                                <p>Anda dapat membuka aplikasi, pilih layanan laundry yang Anda butuhkan, masukkan barang yang ingin Anda laundry, dan lakukan pembayaran melalui metode pembayaran yang disediakan dalam aplikasi.</p>
                            </div>
                    
                            <div class="question">
                                <button>
                                    <span>Apa jenis layanan laundry yang tersedia di aplikasi ini?</span>
                                    <i class="fas fa-chevron-down d-arrow"></i>
                                </button>
                                <p>Jenis layanan laundry yang disediakan pada aplikasi disesuikan dengan mitra yang tersedia.</p>
                            </div>
                    
                            <div class="question">
                                <button>
                                    <span>Bagaimana saya dapat melacak status cucian saya setelah memesan layanan?</span>
                                    <i class="fas fa-chevron-down d-arrow"></i>
                                </button>
                                <p>Anda dapat melihat status cucian Anda melalui menu riwayat pesanan di dalam aplikasi.</p>
                            </div>

                            <div class="question">
                                <button>
                                    <span>Bagaimana cara melakukan pembayaran di aplikasi ini?</span>
                                    <i class="fas fa-chevron-down d-arrow"></i>
                                </button>
                                <p>Setelah memesan layanan, Anda dapat membayar melalui berbagai metode pembayaran yang disediakan dalam aplikasi.</p>
                            </div>

                            <div class="question">
                                <button>
                                    <span>Apakah ada jaminan untuk kualitas layanan laundry yang diberikan?</span>
                                    <i class="fas fa-chevron-down d-arrow"></i>
                                </button>
                                <p>Ya, kami berkomitmen untuk memberikan layanan laundry berkualitas. Jika Anda tidak puas dengan hasilnya, silakan hubungi layanan pelanggan kami untuk penyelesaian lebih lanjut.</p>
                            </div>

                        </div>
                    </section>
                </div>
            </main>
    </div>
</div>

<script src="{{ asset('js/faq.js') }}"></script>
@endsection