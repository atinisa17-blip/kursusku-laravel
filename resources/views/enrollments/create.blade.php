@extends('layouts.app')

@section('title', 'Form Pendaftaran - KursusKu')

@section('content')

<div class="row justify-content-center py-5">
    <div class="col-md-8 col-lg-6">

        <div class="card border-0 rounded-4"
            style="box-shadow: 0 8px 30px rgba(233, 30, 99, 0.12);">

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
                        Pilih peserta dan kursus yang ingin diikuti.
                    </p>
                </div>

                <div class="rounded-pill mb-4"
                    style="height: 4px; background: linear-gradient(90deg, #e91e63, #f9a8d4);">
                </div>

                @if (session('success'))
                    <div class="alert alert-success rounded-3">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('enrollments.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="participant_id" class="form-label fw-semibold">
                            Nama Peserta
                        </label>

                        <select
                            class="form-select rounded-3 py-2"
                            id="participant_id"
                            name="participant_id"
                            required>

                            <option value="">Pilih peserta</option>

                            @foreach ($participants as $participant)
                                <option
                                    value="{{ $participant->id }}"
                                    @selected(old('participant_id') == $participant->id)>
                                    {{ $participant->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="course_id" class="form-label fw-semibold">
                            Pilihan Kursus
                        </label>

                        <select
                            class="form-select rounded-3 py-2"
                            id="course_id"
                            name="course_id"
                            required>

                            <option value="">Pilih kursus</option>

                            @foreach ($courses as $course)
                                <option
                                    value="{{ $course->id }}"
                                    @selected(old('course_id') == $course->id)>
                                    {{ $course->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <button
                        type="submit"
                        class="btn text-white fw-bold w-100 rounded-3 py-2"
                        style="background: #e91e63; border-color: #e91e63;">
                        Daftar Sekarang
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
