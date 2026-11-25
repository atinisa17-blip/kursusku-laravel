
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            background: #fff5f8;
        }

        .login-container {
            display: flex;
            width: 100%;
            min-height: 100vh;
        }

        .login-left {
            width: 45%;
            background: linear-gradient(135deg, #c2185b, #e91e63, #f472b6);
            color: white;
            padding: 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 65px;
        }

        .tagline {
            font-size: 43px;
            line-height: 1.25;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .tagline span {
            color: #ffd6e5;
        }

        .description {
            line-height: 1.7;
            font-size: 14px;
            max-width: 400px;
            opacity: .9;
        }

        .feature-box {
            margin-top: 45px;
            padding: 22px;
            background: rgba(255,255,255,.13);
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 16px;
        }

        .feature {
            padding: 13px 0;
            border-bottom: 1px solid rgba(255,255,255,.15);
        }

        .feature:last-child {
            border-bottom: none;
        }

        .feature strong {
            display: block;
            margin-bottom: 5px;
        }

        .login-right {
            width: 55%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px;
            background: #fff;
        }

        .login-form {
            width: 100%;
            max-width: 420px;
        }

        .welcome {
            color: #ad1457;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }

        h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 12px;
        }

        .subtitle {
            color: #888;
            font-size: 14px;
            margin-bottom: 35px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 23px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            color: #444;
            margin-bottom: 10px;
        }

        input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ead5df;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
            transition: .2s;
        }

        input:focus {
            border-color: #e91e63;
            box-shadow: 0 0 0 3px rgba(233,30,99,.1);
        }

        /* Password dan tombol lihat */
        .password-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .password-wrapper input {
            padding-right: 100px;
        }

        .toggle-password {
            position: absolute;
            right: 12px;
            border: none;
            background: transparent;
            color: #c2185b;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            padding: 8px;
        }

        .toggle-password:hover {
            color: #e91e63;
        }

        /* Remember Me */
        .remember-me {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 5px 0 22px;
        }

        .remember-me input {
            width: 16px;
            height: 16px;
            margin: 0;
            padding: 0;
            accent-color: #e91e63;
            cursor: pointer;
            box-shadow: none;
        }

        .remember-me label {
            margin: 0;
            font-size: 13px;
            font-weight: normal;
            cursor: pointer;
        }

        .login-button {
            width: 100%;
            padding: 16px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(110deg, #e91e63, #f472b6);
            color: white;
            font-weight: bold;
            font-size: 15px;
            cursor: pointer;
            transition: .2s;
        }

        .login-button:hover {
            background: linear-gradient(110deg, #c2185b, #e91e63);
            transform: translateY(-2px);
        }

        /* Lupa Password */
        .forgot-password {
            text-align: center;
            margin-top: 18px;
        }

        .forgot-password a {
            color: #c2185b;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        .forgot-password a:hover {
            color: #e91e63;
            text-decoration: underline;
        }

        .alert {
            padding: 12px;
            border-radius: 8px;
            background: #fce4ec;
            color: #ad1457;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .footer {
            text-align: center;
            color: #aaa;
            font-size: 12px;
            margin-top: 30px;
        }

        @media (max-width: 768px) {
            .login-container {
                flex-direction: column;
            }

            .login-left,
            .login-right {
                width: 100%;
            }

            .login-left {
                padding: 35px 25px;
            }

            .brand {
                margin-bottom: 30px;
            }

            .tagline {
                font-size: 32px;
            }

            .login-right {
                padding: 45px 25px;
            }
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="login-left">
        <div class="brand">♥ KursusKu</div>

        <div class="tagline">
            Setiap kelas.<br>
            Setiap progres.<br>
            <span>Lebih terarah.</span>
        </div>

        <p class="description">
            Kelola aktivitas pembelajaran, data kursus,
            peserta, dan perkembangan mahasiswa melalui
            sistem KursusKu yang terintegrasi.
        </p>

        <div class="feature-box">
            <div class="feature">
                <strong>✓ Manajemen Kelas</strong>
                <small>Kelola data kursus dengan mudah.</small>
            </div>

            <div class="feature">
                <strong>▣ Data Peserta</strong>
                <small>Pantau pendaftaran dan informasi peserta.</small>
            </div>
        </div>
    </div>

    <div class="login-right">
        <div class="login-form">

            <div class="welcome">AKSES ADMINISTRATOR</div>

            <h1>Selamat datang 👋</h1>

            <p class="subtitle">
                Masuk ke akun Anda untuk mengelola
                aktivitas pembelajaran KursusKu.
            </p>

            @if(session('success'))
                <div class="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Masukkan email"
                        value="{{ old('email') }}"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>

                    <div class="password-wrapper">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            required
                        >

                        <button
                            type="button"
                            class="toggle-password"
                            id="togglePassword"
                            aria-label="Lihat password"
                            aria-pressed="false"
                        >
                            Lihat
                        </button>
                    </div>
                </div>

                <!-- Remember Me -->
                <div class="remember-me">
                    <input
                        type="checkbox"
                        name="remember"
                        id="remember"
                        value="1"
                    >

                    <label for="remember">Ingat Saya</label>
                </div>

                <button type="submit" class="login-button">
                    Masuk ke KursusKu →
                </button>

                <!-- Forgot Password -->
                <div class="forgot-password">
                    <a href="{{ route('password.request') }}">
                        Lupa Password?
                    </a>
                </div>

            </form>

            <div class="footer">
                © 2026 KursusKu. All Rights Reserved.
            </div>

        </div>
    </div>

</div>

<script>
    const passwordInput = document.getElementById('password');
    const togglePassword = document.getElementById('togglePassword');

    togglePassword.addEventListener('click', function () {
        const isHidden = passwordInput.type === 'password';

        passwordInput.type = isHidden ? 'text' : 'password';

        togglePassword.textContent = isHidden
            ? 'Sembunyikan'
            : 'Lihat';

        togglePassword.setAttribute('aria-pressed', isHidden);

        togglePassword.setAttribute(
            'aria-label',
            isHidden ? 'Sembunyikan password' : 'Lihat password'
        );
    });
</script>

</body>
</html>
