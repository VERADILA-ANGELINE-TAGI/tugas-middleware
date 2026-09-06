<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin | MiniMarket</title>

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
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ff5f9e, #ff8ac2, #ffb6d9);
            overflow: hidden;
        }

        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255,255,255,0.15);
            animation: floating 6s infinite ease-in-out;
        }

        .circle.one {
            width: 250px;
            height: 250px;
            top: -80px;
            left: -70px;
        }

        .circle.two {
            width: 300px;
            height: 300px;
            bottom: -120px;
            right: -80px;
            animation-delay: 2s;
        }

        @keyframes floating {
            0%, 100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-25px);
            }
        }

        .login-box {
            position: relative;
            width: 400px;
            padding: 40px;
            background: rgba(255,255,255,0.95);
            border-radius: 25px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
            text-align: center;
            animation: muncul 0.8s ease;
        }

        @keyframes muncul {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo {
            font-size: 55px;
            margin-bottom: 10px;
        }

        h1 {
            color: #ff3f8e;
            margin-bottom: 8px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 30px;
        }

        .input-box {
            text-align: left;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #444;
        }

        input {
            width: 100%;
            padding: 14px;
            border: 2px solid #eee;
            border-radius: 12px;
            outline: none;
            transition: 0.3s;
        }

        input:focus {
            border-color: #ff5f9e;
            box-shadow: 0 0 10px rgba(255,95,158,0.2);
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #ff3f8e, #ff75ad);
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-login:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(255,63,142,0.3);
        }

        .error {
            background: #ffe1e8;
            color: #d6336c;
            padding: 10px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .back {
            display: inline-block;
            margin-top: 20px;
            color: #ff3f8e;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="circle one"></div>
    <div class="circle two"></div>

    <div class="login-box">

        <div class="logo">🛒</div>

        <h1>MiniMarket</h1>

        <p class="subtitle">
            Login sebagai Administrator
        </p>

        @if ($errors->any())
            <div class="error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="/login" method="POST">

            @csrf

            <div class="input-box">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    placeholder="Masukkan email admin"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="input-box">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <button type="submit" class="btn-login">
                🔐 Login Admin
            </button>

        </form>

        <a href="/products" class="back">
            ← Kembali ke Produk
        </a>

    </div>

</body>
</html>