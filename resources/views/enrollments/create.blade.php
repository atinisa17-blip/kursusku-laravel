@extends('layouts.app')

@section('title', 'Form Pendaftaran - KursusKu')

@section('content')
<div class="row justify-content-center py-4">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-body p-4">
                <h1 class="h3 fw-bold mb-2">Form Pendaftaran Kursus</h1>
                <p class="text-secondary mb-4">
                    Isi data diri dan pilih kursus yang ingin kamu ikuti.
                </p>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('enrollments.preview') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input
                            type="text"
                            class="form-control"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap"
                            minlength="3"
                            maxlength="100"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="nama@email.com"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Pilihan Kursus</label>
                        <select
                            class="form-select"
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

                    <div id="availability" class="alert alert-info">
                        Pilih kursus untuk melihat sisa kursi.
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        Periksa Pendaftaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

