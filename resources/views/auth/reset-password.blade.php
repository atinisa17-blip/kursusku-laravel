<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - KursusKu</title>

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
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin: 15px 0 8px;
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
            margin-top: 25px;
            padding: 13px;
            border: none;
            border-radius: 8px;
            background: linear-gradient(110deg, #e91e63, #f472b6);
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .error {
            color: #c62828;
            font-size: 14px;
            margin-top: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Reset Password</h2>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ $email }}"
                required
            >

            <label for="password">Password Baru</label>
            <input
                type="password"
                id="password"
                name="password"
                placeholder="Minimal 8 karakter"
                required
            >

            <label for="password_confirmation">Konfirmasi Password</label>
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="Ulangi password baru"
                required
            >

            <button type="submit">Simpan Password Baru</button>
        </form>
    </div>
</body>
</html>