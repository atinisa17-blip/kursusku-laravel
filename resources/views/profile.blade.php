
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        body {
            background: #fce4ec;
            min-height: 100vh;
        }

        /* NAVBAR */
        .navbar {
            height: 52px;
            background: #212529;
            display: flex;
            align-items: center;
            padding: 0 7%;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 18px;
            margin-left: auto;
        }

        .nav-links a {
            color: #bfc3c7;
            text-decoration: none;
            font-size: 15px;
        }

        .nav-links a:hover {
            color: white;
        }

        /* DROPDOWN */
        .dropdown {
            position: relative;
            margin-left: 25px;
        }

        .dropdown-btn {
            background: transparent;
            border: none;
            color: white;
            font-size: 15px;
            cursor: pointer;
            padding: 17px 0;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            width: 160px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 4px 12px rgba(0,0,0,.15);
            overflow: hidden;
            z-index: 10;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu a,
        .dropdown-menu button {
            display: block;
            width: 100%;
            padding: 14px 16px;
            text-align: left;
            text-decoration: none;
            color: #444;
            background: white;
            border: none;
            font-size: 15px;
            cursor: pointer;
        }

        .dropdown-menu a:hover,
        .dropdown-menu button:hover {
            background: #f2f2f2;
        }

        .dropdown-menu form {
            border-top: 1px solid #ddd;
        }

        /* PROFIL */
        .container {
            max-width: 700px;
            margin: 55px auto;
            padding: 20px;
        }

        .profile-card {
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0,0,0,.10);
        }

        h2 {
            color: #c2185b;
            margin-bottom: 25px;
            text-align: center;
        }

        .info {
            padding: 15px;
            border-bottom: 1px solid #f8bbd0;
            color: #444;
        }

        @media (max-width: 600px) {
            .navbar {
                height: auto;
                padding: 12px;
                flex-wrap: wrap;
            }

            .nav-links {
                gap: 12px;
                flex-wrap: wrap;
            }

            .nav-links a,
            .dropdown-btn {
                font-size: 13px;
            }

            .dropdown {
                margin-left: 10px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="nav-links">
            <a href="{{ route('home') }}">Beranda</a>

            <a href="{{ route('courses.index') }}">
                Daftar Kursus
            </a>

            <a href="{{ route('enrollments.index') }}">
                Pendaftaran
            </a>
        </div>

        <div class="dropdown">

            <button type="button" class="dropdown-btn">
                Administrator KursusKu ▾
            </button>

            <div class="dropdown-menu">

                <a href="{{ route('profile') }}">
                    Profil Saya
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit">
                        Logout
                    </button>
                </form>

            </div>
        </div>

    </nav>

    <!-- KONTEN PROFIL -->
    <div class="container">

        <div class="profile-card">

            <h2>Profil Pengguna</h2>

            <div class="info">
                <strong>Nama:</strong>
                {{ Auth::user()->name }}
            </div>

            <div class="info">
                <strong>Email:</strong>
                {{ Auth::user()->email }}
            </div>

        </div>

    </div>

</body>
</html>
