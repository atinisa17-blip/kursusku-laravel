<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $siteName }}</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

    <header class="navbar">
        <div class="container">
            <a href="/" class="logo">KursusKu</a>

            <nav class="nav-links">
                <a href="/">Beranda</a>
                <a href="#katalog">Katalog</a>
                <a href="#tentang">Tentang</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="container hero" id="tentang">
            <div>
                <p><strong>Platform Belajar Online</strong></p>

                <h1>Mulai Belajar, Raih Masa Depanmu!</h1>

                <p>
                    Belajar, daftar, dan kelola kursus dalam satu tempat.
                    Pilih kursus yang sesuai dengan kebutuhanmu dan
                    kembangkan kemampuanmu bersama KursusKu.
                </p>

                <a href="#katalog" style="
                    display: inline-block;
                    background: #0f766e;
                    color: white;
                    padding: 13px 22px;
                    border-radius: 8px;
                    text-decoration: none;
                    font-weight: bold;
                ">Lihat Kursus</a>
            </div>

           <img
    src="{{ asset('images/hero-kursus (2).jpg') }}"
    alt="Ilustrasi pembelajaran KursusKu"
    class="hero-image"
>

        </section>

        <section class="container" id="katalog">
            <div class="section-title">
                <h2>Program Belajar Unggulan</h2>
                <p>Pilih kursus untuk mulai meningkatkan kemampuanmu.</p>
            </div>

            <div class="course-grid">
                @foreach ($featured as $course)
                    <article class="course-card">
                        <span class="course-code">
                            {{ $course['code'] }}
                        </span>

                        <h3>{{ $course['name'] }}</h3>

                        <p>{{ $course['description'] }}</p>
                    </article>
                @endforeach
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; {{ date('Y') }} {{ $siteName }}. Semua hak dilindungi.</p>
        </div>
    </footer>

</body>
</html>