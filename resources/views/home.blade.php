@extends('layouts.app')

@section('title', $siteName)

@section('content')

{{-- HERO --}}
<section class="py-5 mb-4 rounded-4"
    id="tentang"
    style="background: linear-gradient(110deg, #fff0f6, #fce7f3);">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <p class="fw-bold text-uppercase mb-2"
                    style="color: #c2185b; letter-spacing: 2px; font-size: 12px;">
                    PERTEMUAN 7 · FRAMEWORK LARAVEL
                </p>

                <h1 class="display-4 fw-bold mb-3"
                    style="color: #831843; line-height: 1.1;">
                    Belajar terstruktur dengan Route, Controller, dan Blade.
                </h1>

                <p class="fs-6 mb-4"
                    style="color: #6b4355; line-height: 1.8;">
                    Landing page KursusKu dipindahkan dari PHP biasa ke pola
                    framework Laravel. Request masuk melalui route, data disiapkan
                    controller, lalu Blade merender HTML.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <a href="#katalog"
                        class="btn btn-lg text-white fw-bold"
                        style="background-color: #e91e63; border-color: #e91e63; font-size: 14px;">
                        Program Belajar Unggulan
                    </a>

                    <a href="#alur-mvc"
                        class="btn btn-lg fw-bold"
                        style="border: 1px solid #e91e63; color: #c2185b; font-size: 14px;">
                        Lihat Alur MVC
                    </a>
                </div>
            </div>

            <div class="col-lg-6 text-center">
                <img
                    src="{{ asset('images/hero-kursus.jpg') }}"
                    alt="Ilustrasi pembelajaran KursusKu"
                    class="img-fluid rounded-4"
                    style="max-height: 350px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

{{-- ALUR MVC --}}
<section class="py-5" id="alur-mvc">
    <div class="text-center mb-4">
        <p class="fw-bold text-uppercase mb-2"
            style="color: #c2185b; letter-spacing: 2px; font-size: 12px;">
            CARA KERJA LARAVEL
        </p>

        <h2 class="fw-bold" style="color: #831843;">
            Memahami Alur MVC
        </h2>

        <p class="text-secondary">
            Tiga bagian yang bekerja sama untuk menampilkan halaman KursusKu.
        </p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card h-100 rounded-4"
                style="border: 1px solid #fbcfe8; box-shadow: 0 5px 18px rgba(233, 30, 99, 0.08);">
                <div class="card-body p-4">
                    <span class="badge text-white mb-3"
                        style="background-color: #e91e63;">01</span>

                    <h3 class="h5 fw-bold" style="color: #9d174d;">Route</h3>

                    <p class="text-secondary mb-0">
                        Menerima request dari pengguna dan menentukan
                        halaman atau controller yang akan dijalankan.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 rounded-4"
                style="border: 1px solid #fbcfe8; box-shadow: 0 5px 18px rgba(233, 30, 99, 0.08);">
                <div class="card-body p-4">
                    <span class="badge text-white mb-3"
                        style="background-color: #e91e63;">02</span>

                    <h3 class="h5 fw-bold" style="color: #9d174d;">Controller</h3>

                    <p class="text-secondary mb-0">
                        Mengolah request dan menyiapkan data yang diperlukan
                        untuk ditampilkan pada halaman.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 rounded-4"
                style="border: 1px solid #fbcfe8; box-shadow: 0 5px 18px rgba(233, 30, 99, 0.08);">
                <div class="card-body p-4">
                    <span class="badge text-white mb-3"
                        style="background-color: #e91e63;">03</span>

                    <h3 class="h5 fw-bold" style="color: #9d174d;">Blade View</h3>

                    <p class="text-secondary mb-0">
                        Menampilkan data menjadi antarmuka HTML
                        yang dapat dilihat pengguna.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- KATALOG KURSUS --}}
<section class="py-4" id="katalog">
    <div class="text-center mb-4">
        <h2 class="fw-bold" style="color: #831843;">
            Program Belajar Unggulan
        </h2>

        <p class="text-secondary">
            Pilih kursus untuk mulai meningkatkan kemampuanmu.
        </p>
    </div>

    <div class="row g-4">
        @foreach ($featured as $course)
            <div class="col-md-6 col-lg-4">
                <article class="card h-100 rounded-4"
                    style="border: 1px solid #fbcfe8; box-shadow: 0 5px 18px rgba(233, 30, 99, 0.08);">
                    <div class="card-body p-4">
                        <span class="badge mb-2 text-white"
                            style="background-color: #e91e63;">
                            {{ $course['code'] }}
                        </span>

                        <h3 class="card-title h5 fw-bold"
                            style="color: #9d174d;">
                            {{ $course['name'] }}
                        </h3>

                        <p class="card-text text-secondary mb-0">
                            {{ $course['description'] }}
                        </p>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
</section>

{{-- FOOTER --}}
<footer class="text-center py-4 mt-4"
    style="background-color: #fce7f3; color: #9d174d;">
    <p class="mb-0">
        &copy; {{ date('Y') }} {{ $siteName }}.
        Semua hak dilindungi.
    </p>
</footer>

@endsection
