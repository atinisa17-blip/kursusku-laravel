
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff5f8;
            color: #333;
        }

        /* NAVBAR */
        .navbar {
            min-height: 58px;
            background: linear-gradient(110deg, #e91e63, #f472b6);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 7%;
        }

        .nav-content {
            width: 100%;
            max-width: 1100px;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
        }

        .nav-links a:hover {
            color: #fce4ec;
        }

        /* DROPDOWN ADMIN */
        .dropdown {
            position: relative;
            margin-left: auto;
        }

        .dropdown-btn {
            background: transparent;
            border: none;
            color: white;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            padding: 18px 10px;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            width: 180px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,.15);
            overflow: hidden;
            z-index: 10;
        }

        .dropdown:hover .dropdown-menu,
        .dropdown:focus-within .dropdown-menu {
            display: block;
        }

        .dropdown-menu a,
        .dropdown-menu button {
            display: block;
            width: 100%;
            padding: 13px 16px;
            text-align: left;
            text-decoration: none;
            color: #c2185b;
            background: white;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }

        .dropdown-menu a:hover,
        .dropdown-menu button:hover {
            background: #fce4ec;
        }

        .dropdown-menu form {
            border-top: 1px solid #f5d5e1;
        }

        /* AREA DASHBOARD */
        .dashboard-area {
            background: #fff5f8;
            padding: 24px 20px;
            display: flex;
            justify-content: center;
        }

        .dashboard-btn {
            display: inline-block;
            padding: 16px 22px;
            border: 1px solid #e91e63;
            border-radius: 10px;
            color: #c2185b;
            background: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 15px;
            transition: .2s;
        }

        .dashboard-btn:hover {
            background: #e91e63;
            color: white;
        }

        /* KONTEN PROFIL */
        .container {
            max-width: 950px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .heading {
            margin-bottom: 25px;
        }

        .heading h1 {
            color: #c2185b;
            margin-bottom: 8px;
        }

        .heading p {
            color: #777;
        }

        .profile-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 8px 25px rgba(194, 24, 91, 0.10);
        }

        .profile-header {
            display: flex;
            align-items: center;
            gap: 20px;
            padding-bottom: 25px;
            border-bottom: 1px solid #f5d5e1;
        }

        .avatar {
            width: 85px;
            height: 85px;
            border-radius: 50%;
            background: #fce4ec;
            color: #c2185b;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 35px;
            font-weight: bold;
        }

        .profile-header h2 {
            margin: 0 0 8px;
            color: #c2185b;
        }

        .profile-header p {
            margin: 0;
            color: #777;
        }

        .section-title {
            color: #c2185b;
            margin: 28px 0 18px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 13px;
            border: 1px solid #f3c2d4;
            border-radius: 9px;
            background: #fffafd;
            font-size: 15px;
        }

        .status {
            display: inline-block;
            background: #fce4ec;
            color: #c2185b;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 10px 5%;
            }

            .nav-content,
            .nav-links {
                flex-wrap: wrap;
            }

            .nav-links {
                gap: 12px;
            }

            .nav-links a,
            .dropdown-btn {
                font-size: 13px;
            }

            .dropdown {
                margin-left: 0;
            }

            .container {
                margin-top: 25px;
            }

            .profile-card {
                padding: 22px;
            }

            .profile-header {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="nav-content">

            <div class="nav-links">
                <a href="/">Beranda</a>

                <a href="{{ route('courses.index') }}">
                    Daftar Kursus
                </a>

                <a href="{{ route('enrollments.index') }}">
                    Pendaftaran
                </a>
            </div>

            <!-- DROPDOWN ADMIN -->
            <div class="dropdown">
                <button type="button" class="dropdown-btn">
                    Administrator KursusKu ▾
                </button>

                <div class="dropdown-menu">
                    <a href="/profile">Profil Saya</a>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </div>
            </div>

        </div>
    </nav>

    <!-- TOMBOL KEMBALI KE DASHBOARD -->
    <div class="dashboard-area">
        <a href="/" class="dashboard-btn">
            Kembali ke Dashboard
        </a>
    </div>

    <!-- KONTEN PROFIL -->
    <main class="container">

        <div class="heading">
            <h1>Profil Saya</h1>
            <p>Selamat datang di halaman profil akun KursusKu.</p>
        </div>

        <section class="profile-card">

            <div class="profile-header">

                <div class="avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div>
                    <h2>{{ auth()->user()->name }}</h2>
                    <p>{{ auth()->user()->email }}</p>
                    <br>
                    <span class="status">● Akun Aktif</span>
                </div>

            </div>

            <h3 class="section-title">Informasi Akun</h3>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text"
                       value="{{ auth()->user()->name }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Alamat Email</label>
                <input type="email"
                       value="{{ auth()->user()->email }}"
                       readonly>
            </div>

            <div class="form-group">
                <label>Status Akun</label>
                <input type="text"
                       value="Aktif"
                       readonly>
            </div>

        </section>

    </main>

</body>
</html>
