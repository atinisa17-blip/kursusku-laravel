@extends('layouts.app')

@section('title', 'Preview Pendaftaran - KursusKu')

@section('content')

<div class="row justify-content-center py-5">
    <div class="col-md-8 col-lg-6">

        <div class="card border-0 rounded-4"
            style="box-shadow: 0 8px 30px rgba(233, 30, 99, 0.12);">

            <div class="card-body p-4 p-md-5">

                {{-- Header preview --}}
                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                        style="width: 64px; height: 64px; background: #fce7f3; color: #c2185b;">
                        <span style="font-size: 30px;">♡</span>
                    </div>

                    <h1 class="h3 fw-bold mb-2" style="color: #9d174d;">
                        Preview Pendaftaran
                    </h1>

                    <p class="text-secondary mb-0">
                        Periksa kembali data pendaftaran kamu.
                    </p>
                </div>

                <div class="rounded-pill mb-4"
                    style="height: 4px; background: linear-gradient(90deg, #e91e63, #f9a8d4);">
                </div>

                {{-- Status pemeriksaan --}}
                <div class="alert rounded-3 mb-4"
                    style="background: #fce7f3; color: #9d174d; border: 1px solid #f9a8d4;">
                    <strong>✓ Data pendaftaran berhasil diperiksa!</strong>
                    <div class="small mt-1">
                        Pastikan data berikut sudah benar.
                    </div>
                </div>

                {{-- Nama lengkap --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold" style="color: #831843;">
                        Nama Lengkap
                    </label>

                    <div class="form-control rounded-3 py-2"
                        style="background: #fff5f9; border-color: #fbcfe8;">
                        {{ $registration['name'] }}
                    </div>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold" style="color: #831843;">
                        Email
                    </label>

                    <div class="form-control rounded-3 py-2"
                        style="background: #fff5f9; border-color: #fbcfe8;">
                        {{ $registration['email'] }}
                    </div>
                </div>

                {{-- Pilihan kursus --}}
                <div class="mb-4">
                    <label class="form-label fw-semibold" style="color: #831843;">
                        Pilihan Kursus
                    </label>

                    <div class="form-control rounded-3 py-2"
                        style="background: #fff5f9; border-color: #fbcfe8;">
                        {{ $courseName }}
                    </div>
                </div>

                {{-- Tombol kembali --}}
                <a href="{{ route('enrollments.create') }}"
                    class="btn w-100 rounded-3 py-2 fw-semibold"
                    style="border: 1px solid #e91e63; color: #c2185b;">
                    ← Kembali ke Form
                </a>

            </div>
        </div>

        <p class="text-center text-secondary small mt-3">
            KursusKu · Pastikan data kamu sudah sesuai.
        </p>

    </div>
</div>

@endsection
