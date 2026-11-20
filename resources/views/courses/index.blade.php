
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus - KursusKu</title>

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

        input, select {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        input:focus, select:focus {
            outline: 2px solid #f4a6cc;
            border-color: #d94f96;
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

        /* Pagination */
        .pagination-wrapper {
            margin-top: 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .pagination-info {
            color: #87677b;
            font-size: 14px;
        }

        .pagination-nav {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .page-link {
            display: inline-block;
            padding: 9px 14px;
            border-radius: 7px;
            border: 1px solid #f1d7e5;
            text-decoration: none;
            color: #c04483;
            background: white;
            font-size: 14px;
            transition: 0.2s;
        }

        .page-link:hover {
            background: #fce1ee;
        }

        .page-active {
            background: #d94f96;
            color: white;
            border-color: #d94f96;
            padding: 9px 14px;
            border-radius: 7px;
            font-size: 14px;
        }

        .page-disabled {
            display: inline-block;
            padding: 9px 14px;
            border-radius: 7px;
            border: 1px solid #f1d7e5;
            color: #b9a6b1;
            background: #f8f1f5;
            font-size: 14px;
        }

        @media (max-width: 600px) {
            body {
                padding: 12px;
            }

            .container {
                padding: 18px;
            }

            .pagination-wrapper {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>

<body>
    <div class="container">

        <h1>Daftar Kursus</h1>

        <p class="subtitle">
            Kelola dan pantau data kursus yang tersedia di KursusKu.
        </p>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tombol tambah, pencarian, dan filter -->
        <div style="display: flex; flex-wrap: wrap; gap: 10px; align-items: center; margin-bottom: 20px;">

            <a href="{{ route('courses.create') }}"
                class="btn"
                style="margin-bottom: 0;">
                + Tambah Kursus
            </a>

            <form action="{{ route('courses.index') }}"
                method="GET"
                style="display: flex; flex-wrap: wrap; gap: 8px;">

                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Cari kode atau nama kursus..."
                    style="padding: 10px; border: 1px solid #e9c7d9; border-radius: 8px; min-width: 220px;">

                <select
                    name="status"
                    style="padding: 10px; border: 1px solid #e9c7d9; border-radius: 8px;">

                    <option value="">Semua Status</option>

                    <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>
                        Open
                    </option>

                    <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>
                        Closed
                    </option>

                    <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>
                        Draft
                    </option>

                </select>

                <button
                    type="submit"
                    class="btn"
                    style="margin-bottom: 0; border: none; cursor: pointer;">
                    Cari
                </button>

                <a href="{{ route('courses.index') }}"
                    class="btn"
                    style="background: #87677b; margin-bottom: 0;">
                    Reset
                </a>

            </form>
        </div>

        <!-- Tabel daftar kursus -->
        <div class="table-wrapper">
            <table>

                <thead>
                    <tr>
                        <th>No</th>
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
                            <td>
                                {{ $courses->firstItem() + $loop->index }}
                            </td>

                            <td>{{ $course->code }}</td>

                            <td>{{ $course->name }}</td>

                            <td>
                                Rp {{ number_format($course->fee, 0, ',', '.') }}
                            </td>

                            <td>{{ $course->quota }}</td>

                            <td>
                                {{ $course->start_date->format('d-m-Y') }}
                            </td>

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

                                    <a href="{{ route('courses.edit', $course->id) }}"
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
                            <td colspan="8" class="empty">
                                Data kursus tidak ditemukan.
                                Silakan coba kata kunci atau filter lainnya.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">

            <div class="pagination-info">
                Menampilkan {{ $courses->firstItem() ?? 0 }}
                sampai {{ $courses->lastItem() ?? 0 }}
                dari {{ $courses->total() }} kursus
            </div>

            <div class="pagination-nav">

                @if ($courses->onFirstPage())
                    <span class="page-disabled">
                        « Sebelumnya
                    </span>
                @else
                    <a href="{{ $courses->previousPageUrl() }}"
                        class="page-link">
                        « Sebelumnya
                    </a>
                @endif

                @foreach ($courses->getUrlRange(1, $courses->lastPage()) as $page => $url)

                    @if ($page == $courses->currentPage())
                        <span class="page-active">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}" class="page-link">
                            {{ $page }}
                        </a>
                    @endif

                @endforeach

                @if ($courses->hasMorePages())
                    <a href="{{ $courses->nextPageUrl() }}"
                        class="page-link">
                        Selanjutnya »
                    </a>
                @else
                    <span class="page-disabled">
                        Selanjutnya »
                    </span>
                @endif

            </div>
        </div>

    </div>
</body>
</html>
