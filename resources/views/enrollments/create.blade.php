@extends('layouts.app')

@section('title', 'Form Pendaftaran - KursusKu')

@section('content')

<div class="row justify-content-center py-5">
    <div class="col-md-8 col-lg-6">

        <div class="card border-0 rounded-4"
            style="box-shadow: 0 8px 30px rgba(233, 30, 99, 0.12);">

            {{-- Header formulir --}}
            <div class="card-body p-4 p-md-5">

                <div class="text-center mb-4">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle mb-3"
                        style="width: 64px; height: 64px; background: #fce7f3; color: #c2185b;">
                        <span style="font-size: 30px;">♡</span>
                    </div>

                    <h1 class="h3 fw-bold mb-2" style="color: #9d174d;">
                        Form Pendaftaran Kursus
                    </h1>

                    <p class="text-secondary mb-0">
                        Isi data diri dan pilih kursus yang ingin kamu ikuti.
                    </p>
                </div>

                <div class="rounded-pill mb-4"
                    style="height: 4px; background: linear-gradient(90deg, #e91e63, #f9a8d4);">
                </div>

                {{-- Pesan berhasil --}}
                @if (session('success'))
                    <div class="alert alert-success rounded-3">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Pesan validasi --}}
                @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form pendaftaran --}}
                <form action="{{ route('enrollments.preview') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            class="form-control rounded-3 py-2"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap"
                            minlength="3"
                            maxlength="100"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">
                            Email
                        </label>

                        <input
                            type="email"
                            class="form-control rounded-3 py-2"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label fw-semibold">
                            Pilihan Kursus
                        </label>

                        <select
                            class="form-select rounded-3 py-2"
                            id="course_id"
                            name="course_id"
                            required>

                            <option value="">Pilih kursus</option>

                            @foreach ($courses as $id => $course)
                                <option
                                    value="{{ $id }}"
                                    @selected(old('course_id') == $id)>
                                    {{ $course['name'] }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    {{-- Informasi ketersediaan kursi dari AJAX --}}
                    <div
                        id="availability"
                        class="alert rounded-3"
                        style="background: #fff0f6; color: #9d174d; border: 1px solid #fbcfe8;">
                        Pilih kursus untuk melihat sisa kursi.
                    </div>

                    <button
                        type="submit"
                        class="btn text-white fw-bold w-100 rounded-3 py-2"
                        style="background: #e91e63; border-color: #e91e63;">
                        Periksa Pendaftaran
                    </button>

                </form>

            </div>
        </div>

        <p class="text-center text-secondary small mt-3">
            KursusKu · Mulai langkah belajarmu hari ini
        </p>

    </div>
</div>

@endsection
