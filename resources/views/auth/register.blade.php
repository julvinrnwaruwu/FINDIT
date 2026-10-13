<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun | FINDIT</title>
    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #eef6ff, #ffffff);
            color: #183153;
        }

        .card {
            width: 100%;
            max-width: 440px;
            padding: 36px;
            background: #fff;
            border: 1px solid #e3edfa;
            border-radius: 22px;
            box-shadow: 0 15px 45px rgba(37, 99, 170, .10);
        }

        .logo {
            color: #2476df;
            font-size: 29px;
            font-weight: 800;
            letter-spacing: -1px;
            text-align: center;
        }

        .subtitle {
            margin: 8px 0 28px;
            text-align: center;
            color: #718096;
            font-size: 14px;
        }

        h2 {
            margin-bottom: 8px;
            text-align: center;
            font-size: 24px;
        }

        label {
            display: block;
            margin: 17px 0 8px;
            font-size: 14px;
            font-weight: 600;
        }

        input {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid #d9e4f2;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #3986ed;
            box-shadow: 0 0 0 3px #e7f1ff;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
        }

        .btn {
            width: 100%;
            margin-top: 24px;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #2878e5;
            color: white;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
        }

        .btn:hover { background: #1765cd; }

        .bottom {
            margin-top: 22px;
            text-align: center;
            color: #718096;
            font-size: 14px;
        }

        a {
            color: #2476df;
            font-weight: 700;
            text-decoration: none;
        }

        .back {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 13px;
        }
    </style>
</head>
<body>
    <main class="card">
        <div class="logo">FINDIT</div>
        <p class="subtitle">Lost something? Let's FINDIT.</p>

        <h2>Buat Akun Baru</h2>
        <p class="subtitle">Bergabung untuk membantu menemukan barang.</p>

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <label for="name">Nama lengkap</label>
            <input id="name" type="text" name="name"
                   value="{{ old('name') }}"
                   placeholder="Masukkan nama lengkap"
                   autocomplete="name" required>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="email">Email</label>
            <input id="email" type="email" name="email"
                   value="{{ old('email') }}"
                   placeholder="nama@email.com"
                   autocomplete="email" required>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">Password</label>
            <input id="password" type="password" name="password"
                   placeholder="Minimal 8 karakter"
                   autocomplete="new-password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror

            <label for="password_confirmation">Konfirmasi password</label>
            <input id="password_confirmation" type="password"
                   name="password_confirmation"
                   placeholder="Ulangi password"
                   autocomplete="new-password" required>

            <button class="btn" type="submit">Daftar Sekarang</button>
        </form>

        <div class="bottom">
            Sudah punya akun? <a href="{{ route('login') }}">Masuk</a>
        </div>

        <a class="back" href="{{ route('home') }}">← Kembali ke Beranda</a>
    </main>
</body>
</html>
