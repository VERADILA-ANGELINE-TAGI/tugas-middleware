<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title') | TRPL</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        /* NAVBAR */
        nav {
            background: linear-gradient(135deg, #172554, #1e40af);
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        }

        .logo {
            color: white;
            font-size: 22px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .logo span {
            color: #60a5fa;
        }

        .menu {
            display: flex;
            gap: 25px;
        }

        .menu a {
            color: white;
            text-decoration: none;
            font-size: 15px;
            font-weight: bold;
            position: relative;
            transition: 0.3s;
        }

        .menu a::after {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            background: #60a5fa;
            left: 0;
            bottom: -7px;
            transition: 0.3s;
        }

        .menu a:hover {
            color: #93c5fd;
        }

        .menu a:hover::after {
            width: 100%;
        }

        /* CONTENT */
        .container {
            width: 84%;
            max-width: 1100px;
            margin: 45px auto;
            min-height: 500px;
            animation: muncul 0.8s ease;
        }

        /* ANIMATION */
        @keyframes muncul {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes naik {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate {
            animation: naik 0.8s ease;
        }

        /* CARD */
        .card {
            background: white;
            padding: 30px;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.08);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 30px rgba(15, 23, 42, 0.13);
        }

        /* BUTTON */
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 22px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background: #1d4ed8;
            transform: translateY(-3px);
            box-shadow: 0 7px 15px rgba(37, 99, 235, 0.3);
        }

        /* FOOTER */
        footer {
            background: #172554;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 70px;
        }

        footer p {
            opacity: 0.8;
            font-size: 14px;
        }

        /* MOBILE */
        @media (max-width: 700px) {

            nav {
                padding: 15px 5%;
                flex-direction: column;
                gap: 15px;
            }

            .menu {
                gap: 14px;
                flex-wrap: wrap;
                justify-content: center;
            }

            .menu a {
                font-size: 13px;
            }

            .container {
                width: 90%;
                margin: 30px auto;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav>

        <div class="logo">
            TRPL<span>.</span>
        </div>

        <div class="menu">
            <a href="/">Home</a>
            <a href="/tentang">Tentang</a>
            <a href="/dosen">Dosen</a>
            <a href="/kontak">Kontak</a>
        </div>

    </nav>


    <!-- CONTENT -->
    <main class="container">

        @yield('content')

    </main>


    <!-- FOOTER -->
    <footer>

        <h3>Teknologi Rekayasa Perangkat Lunak</h3>

        <p>
            Jurusan Teknologi Informasi
        </p>

        <p style="margin-top: 10px;">
            &copy; 2026 TRPL. All Rights Reserved.
        </p>

    </footer>

</body>

</html>