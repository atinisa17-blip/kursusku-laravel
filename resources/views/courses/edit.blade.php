<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kursus</title>
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
        .error { color: #b42318; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Kursus</h1>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="code">Kode Kursus</label>
            <input id="code" name="code" value="{{ old('code', $course->code) }}" maxlength="20" required>

            <label for="name">Nama Kursus</label>
            <input id="name" name="name" value="{{ old('name', $course->name) }}" maxlength="120" required>

            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" rows="3">{{ old('description', $course->description) }}</textarea>

            <label for="fee">Biaya (Rp)</label>
            <input id="fee" type="number" name="fee" min="0" value="{{ old('fee', $course->fee) }}" required>

            <label for="quota">Kuota Peserta</label>
            <input id="quota" type="number" name="quota" min="0" max="65535" value="{{ old('quota', $course->quota) }}" required>

            <label for="start_date">Tanggal Mulai</label>
            <input id="start_date" type="date" name="start_date" value="{{ old('start_date', $course->start_date->format('Y-m-d')) }}" required>

            <label for="status">Status Kursus</label>
            <select id="status" name="status" required>
                <option value="draft" @selected(old('status', $course->status) === 'draft')>Draft</option>
                <option value="open" @selected(old('status', $course->status) === 'open')>Dibuka</option>
                <option value="closed" @selected(old('status', $course->status) === 'closed')>Ditutup</option>
            </select>

            <button type="submit">Simpan Perubahan</button>
            <a href="{{ route('courses.index') }}" class="back">Kembali</a>
        </form>
    </div>
</body>
</html>
