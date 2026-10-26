@extends('layouts.app')

@section('title', 'Preview Pendaftaran - KursusKu')

@section('content')
<div class="row justify-content-center py-4">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <div class="alert alert-success">
                    Data pendaftaran berhasil diperiksa!
                </div>

                <h1 class="h3 fw-bold mb-2">Preview Pendaftaran</h1>
                <p class="text-secondary mb-4">
                    Periksa kembali data pendaftaran kamu.
                </p>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Lengkap</label>
                    <div class="form-control bg-light">
                        {{ $registration['name'] }}
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <div class="form-control bg-light">
                        {{ $registration['email'] }}
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Pilihan Kursus</label>
                    <div class="form-control bg-light">
                        {{ $courseName }}
                    </div>
                </div>

                <a href="{{ route('enrollments.create') }}"
                   class="btn btn-outline-secondary w-100">
                    Kembali ke Form
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
