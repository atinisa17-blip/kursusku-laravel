
<header>
    <!-- Identitas KursusKu -->
    <div style="background: linear-gradient(110deg, #e91e63, #f472b6); color: white; padding: 18px 0;">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <div style="background: #c2185b; padding: 10px 14px; border-radius: 12px; font-weight: bold;">
                    K
                </div>

                <div>
                    <div class="fs-4 fw-bold">KursusKu</div>
                    <div style="font-size: 13px;">Laravel MVC</div>
                </div>
            </div>

            <span style="border: 1px solid #fbc3d7; border-radius: 24px; padding: 5px 18px; font-size: 13px;">
                Milestone 7
            </span>
        </div>
    </div>

    <!-- Menu navigasi -->
    <nav style="background: #ad1457; padding: 12px 0;">
        <div class="container-fluid px-4 d-flex justify-content-between align-items-center flex-nowrap gap-3">

            <!-- Menu sebelah kiri -->
            <div class="d-flex align-items-center flex-nowrap gap-3"
                 style="white-space: nowrap;">

                <a class="text-white text-decoration-none fw-semibold"
                   style="font-size: 14px;" href="/">
                    Beranda
                </a>

                <a class="text-white text-decoration-none fw-semibold"
                   style="font-size: 14px;" href="/#alur-mvc">
                    Alur MVC
                </a>

                <a class="text-white text-decoration-none fw-semibold"
                   style="font-size: 14px;" href="/#katalog">
                    Kursus Pilihan
                </a>

                <a class="text-white text-decoration-none fw-semibold"
                   style="font-size: 14px;"
                   href="{{ route('courses.index') }}">
                    Daftar Kursus
                </a>

                <a class="text-white text-decoration-none fw-semibold"
                   style="font-size: 14px;"
                   href="{{ route('enrollments.create') }}">
                    Form Pendaftaran
                </a>

                <a class="text-white text-decoration-none fw-semibold"
                   style="font-size: 14px;"
                   href="{{ route('enrollments.index') }}">
                    Laporan Pendaftaran
                </a>

            </div>

            <!-- Tombol sebelah kanan -->
            <div class="d-flex align-items-center flex-nowrap gap-2"
                 style="white-space: nowrap;">

                @guest
                    <a href="{{ route('login') }}"
                       class="btn btn-light fw-semibold px-3"
                       style="color: #c2185b; font-size: 14px;">
                        Login
                    </a>
                @endguest

                @auth
                    <div class="dropdown">
                        <button class="btn btn-light fw-semibold px-3 dropdown-toggle"
                                style="color: #c2185b; font-size: 14px;"
                                type="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                            Administrator KursusKu
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="/profile">
                                    Profil Saya
                                </a>
                            </li>

                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth

                <a href="/#katalog"
                   class="btn btn-light fw-semibold px-3"
                   style="color: #c2185b; font-size: 14px;">
                    Lihat Program
                </a>

            </div>
        </div>
    </nav>
</header>
