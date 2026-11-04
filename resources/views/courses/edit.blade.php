<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursus - KursusKu</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff0f6;
            color: #4a2340;
            padding: 30px;
        }

        .container {
            max-width: 650px;
            margin: auto;
            padding: 25px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 15px #e9c7d9;
        }

        h1 { color: #c04483; }

        label {
            display: block;
            margin-top: 14px;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input, textarea, select {
            box-sizing: border-box;
            width: 100%;
            padding: 10px;
            border: 1px solid #e3b8d0;
            border-radius: 8px;
            font: inherit;
        }

        button, .back {
            display: inline-block;
            margin-top: 20px;
            padding: 11px 16px;
            border: none;
            border-radius: 8px;
            background: #d94f96;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }

        .back { background: #806579; }

        .error {
            color: #b42318;
            font-size: 14px;
            margin-top: 5px;
        }

        .alert {
            background: #fff1f0;
            border: 1px solid #f5b7b1;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Kursus</h1>

        @if (session('success'))
            <div>{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert">
                <strong>Periksa kembali data yang kamu masukkan.</strong>
            </div>
        @endif

        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="code">Kode Kursus</label>
            <input id="code" name="code"
                value="{{ old('code', $course->code) }}"
                maxlength="20" required>
            @error('code')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="name">Nama Kursus</label>
            <input id="name" name="name"
                value="{{ old('name', $course->name) }}"
                maxlength="120" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="description">Deskripsi</label>
            <textarea id="description" name="description"
                rows="3">{{ old('description', $course->description) }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="fee">Biaya (Rp)</label>
            <input id="fee" type="number" name="fee"
                min="0" step="1"
                value="{{ old('fee', $course->fee) }}" required>
            @error('fee')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="quota">Kuota Peserta</label>
            <input id="quota" type="number" name="quota"
                min="1" max="500" step="1"
                value="{{ old('quota', $course->quota) }}" required>
            @error('quota')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="start_date">Tanggal Mulai</label>
            <input id="start_date" type="date" name="start_date"
                value="{{ old('start_date', $course->start_date ? \Illuminate\Support\Carbon::parse($course->start_date)->format('Y-m-d') : '') }}"
                required>
            @error('start_date')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="status">Status Kursus</label>
            <select id="status" name="status" required>
                <option value="draft" @selected(old('status', $course->status) === 'draft')>Draft</option>
                <option value="open" @selected(old('status', $course->status) === 'open')>Dibuka</option>
                <option value="closed" @selected(old('status', $course->status) === 'closed')>Ditutup</option>
            </select>
            @error('status')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">Simpan Perubahan</button>
            <a href="{{ route('courses.index') }}" class="back">Kembali</a>
        </form>
    </div>
</body>
</html>
