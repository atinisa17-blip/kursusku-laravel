<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus - Kursusku</title>

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
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 28px;
            border-radius: 16px;
            box-shadow: 0 4px 18px #e9c7d9;
        }

        h1 {
            color: #c04483;
            margin-top: 0;
        }

        .subtitle {
            color: #87677b;
            margin-bottom: 24px;
        }

        .btn {
            display: inline-block;
            padding: 11px 16px;
            border-radius: 8px;
            text-decoration: none;
            background: #d94f96;
            color: white;
            font-weight: bold;
            margin-bottom: 20px;
            transition: 0.2s;
        }

        .btn:hover {
            background: #bd347b;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
            border: 1px solid #f1d7e5;
            border-radius: 10px;
        }

        table {
            width: 100%;
            min-width: 850px;
            border-collapse: collapse;
        }

        th, td {
            padding: 14px 12px;
            border-bottom: 1px solid #f5e2ec;
            text-align: left;
        }

        th {
            background: #fce1ee;
            color: #79365b;
            font-size: 13px;
        }

        tbody tr:hover {
            background: #fff8fb;
        }

        .success {
            background: #e3f8e8;
            color: #216b35;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 18px;
        }

        .empty {
            text-align: center;
            padding: 28px;
            color: #8b6a7e;
        }

        .aksi {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .aksi form {
            margin: 0;
        }

        .btn-edit, .btn-hapus {
            display: inline-block;
            padding: 8px 13px;
            border: none;
            border-radius: 7px;
            color: white;
            font-size: 13px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-edit {
            background: #d94f96;
        }

        .btn-edit:hover {
            background: #bd347b;
        }

        .btn-hapus {
            background: #e05265;
        }

        .btn-hapus:hover {
            background: #c73549;
        }

        .status {
            display: inline-block;
            padding: 5px 9px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .status-draft {
            background: #f0e7f0;
            color: #765b76;
        }

        .status-open {
            background: #e0f7e9;
            color: #247447;
        }

        .status-closed {
            background: #ffe4e6;
            color: #b42336;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Daftar Kursus</h1>
        <p class="subtitle">
            Kelola dan pantau data kursus yang tersedia di Kursusku.
        </p>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('courses.create') }}" class="btn">
            + Tambah Kursus
        </a>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Kursus</th>
                        <th>Biaya</th>
                        <th>Kuota</th>
                        <th>Tanggal Mulai</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($courses as $course)
                        <tr>
                            <td>{{ $course->code }}</td>
                            <td>{{ $course->name }}</td>
                            <td>Rp {{ number_format($course->fee, 0, ',', '.') }}</td>
                            <td>{{ $course->quota }}</td>
                            <td>{{ $course->start_date->format('d-m-Y') }}</td>
                            <td>
                                <span class="status status-{{ $course->status }}">
                                    {{ ucfirst($course->status) }}
                                </span>
                            </td>
                            <td>
                                <div class="aksi">
                                    <a href="{{ route('courses.show', $course->id) }}"
   class="btn-edit">
    Detail
</a>
                                    <a
                                        href="{{ route('courses.edit', $course->id) }}"
                                        class="btn-edit">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('courses.destroy', $course->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus kursus ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-hapus">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                Belum ada data kursus. Silakan tambahkan kursus.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
