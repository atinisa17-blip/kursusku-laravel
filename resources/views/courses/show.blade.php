<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kursus - Kursusku</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #fff0f6;
            color: #4a2340;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 700px;
            margin: auto;
            padding: 28px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 18px #e9c7d9;
        }

        h1 {
            color: #c04483;
        }

        .detail {
            padding: 14px 0;
            border-bottom: 1px solid #f1d7e5;
        }

        .label {
            display: block;
            margin-bottom: 5px;
            color: #8b6a7e;
            font-size: 13px;
        }

        .value {
            font-weight: bold;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            border-radius: 8px;
            background: #d94f96;
            color: white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Detail Kursus</h1>

        <div class="detail">
            <span class="label">Kode Kursus</span>
            <span class="value">{{ $course->code }}</span>
        </div>

        <div class="detail">
            <span class="label">Nama Kursus</span>
            <span class="value">{{ $course->name }}</span>
        </div>

        <div class="detail">
            <span class="label">Deskripsi</span>
            <span class="value">{{ $course->description ?: 'Belum ada deskripsi' }}</span>
        </div>

        <div class="detail">
            <span class="label">Biaya</span>
            <span class="value">Rp {{ number_format($course->fee, 0, ',', '.') }}</span>
        </div>

        <div class="detail">
            <span class="label">Kuota Peserta</span>
            <span class="value">{{ $course->quota }} peserta</span>
        </div>

        <div class="detail">
            <span class="label">Tanggal Mulai</span>
            <span class="value">{{ $course->start_date->format('d-m-Y') }}</span>
        </div>

        <div class="detail">
            <span class="label">Status</span>
            <span class="value">{{ ucfirst($course->status) }}</span>
        </div>

        <a href="{{ route('courses.index') }}" class="btn">
            Kembali ke Daftar Kursus
        </a>
    </div>
</body>
</html>
