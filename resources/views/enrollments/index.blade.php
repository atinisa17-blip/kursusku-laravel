@extends('layouts.app')

@section('title', 'Laporan Pendaftaran - KursusKu')

@section('content')

<div class="container py-5">

    <div class="text-center mb-4">
        <h1 class="fw-bold" style="color: #9d174d;">
            Laporan Pendaftaran Kursus
        </h1>
        <p class="text-secondary">
            Daftar peserta yang sudah terdaftar pada kursus KursusKu.
        </p>
    </div>

    @if (session('success'))
        <div class="alert alert-success rounded-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 rounded-4"
        style="box-shadow: 0 8px 30px rgba(233, 30, 99, 0.12);">

        <div class="card-body p-4">

            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0" style="color: #9d174d;">
                    Data Pendaftaran
                </h5>

                <a href="{{ route('enrollments.create') }}"
                    class="btn text-white rounded-3"
                    style="background: #e91e63;">
                    + Pendaftaran Baru
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background: #fce7f3;">
                        <tr>
                            <th>No</th>
                            <th>Nama Peserta</th>
                            <th>Nama Kursus</th>
                            <th>Tanggal Mulai</th>
                            <th>Status Pendaftaran</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($enrollments as $enrollment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $enrollment->participant->name }}
                                </td>

                                <td>
                                    {{ $enrollment->course->name }}
                                </td>

                                <td>
                                    {{ $enrollment->course->start_date?->format('d-m-Y') ?? '-' }}
                                </td>

                                <td>
                                    <span class="badge rounded-pill"
                                        style="background: #fce7f3; color: #9d174d;">
                                        {{ ucfirst($enrollment->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-secondary py-4">
                                    Belum ada data pendaftaran.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection
