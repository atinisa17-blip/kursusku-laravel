<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - KursusKu</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #fce4ec, #f8bbd0);
            font-family: Arial, sans-serif;
        }

        .container {
            width: 90%;
            max-width: 420px;
            background: white;
            padding: 35px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        h2 {
            text-align: center;
            color: #c2185b;
            margin-bottom: 10px;
        }

        p {
            text-align: center;
            color: #777;
            font-size: 14px;
            line-height: 1.5;
        }

        label {
            display: block;
            margin: 20px 0 8px;
            color: #444;
        }

        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #f48fb1;
            border-radius: 8px;
            outline: none;
        }

        button {
            width: 100%;
            margin-top: 22px;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(110deg, #e91e63, #f472b6);
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.9;
        }

        .message {
            padding: 10px;
            border-radius: 8px;
            margin-top: 15px;
            font-size: 14px;
        }

        .success {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .error {
            background: #ffebee;
            color: #c62828;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #c2185b;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Lupa Password?</h2>

        <p>
            Masukkan email akun kamu untuk mendapatkan tautan
            pengaturan ulang password.
        </p>

        @if (session('success'))
            <div class="message success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="message error">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="message error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email akun"
                required
            >

            <button type="submit">Kirim Tautan Reset</button>
        </form>

        <a href="{{ route('login') }}" class="back">
            Kembali ke Login
        </a>
    </div>
</body>
</html>