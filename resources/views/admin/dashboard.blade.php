<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard Admin | MiniMarket</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f6fa;
            color: #333;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 250px;
            height: 100vh;

            background: linear-gradient(
                180deg,
                #ff3f8e,
                #ff75ad
            );

            color: white;
            padding: 25px 18px;

            box-shadow: 5px 0 20px rgba(0,0,0,.1);
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
            text-align: center;

            padding-bottom: 30px;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            margin: 8px 0;
        }

        .menu a {
            display: block;

            padding: 14px 16px;

            color: white;
            text-decoration: none;

            border-radius: 10px;

            transition: .3s;
        }

        .menu a:hover,
        .menu .active {
            background: rgba(255,255,255,.2);
            transform: translateX(5px);
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        .logout button {
            width: 100%;

            padding: 12px;

            border: 1px solid rgba(255,255,255,.5);
            border-radius: 10px;

            background: transparent;
            color: white;

            cursor: pointer;
        }

        /* MAIN */

        .main {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .welcome p {
            color: #888;
        }

        .admin {
            background: white;
            padding: 10px 18px;
            border-radius: 30px;

            box-shadow: 0 4px 15px rgba(0,0,0,.06);
        }

        /* STATISTIC */

        .stats {
            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 20px;

            margin-bottom: 30px;
        }

        .stat-card {
            background: white;

            padding: 25px;

            border-radius: 15px;

            display: flex;
            align-items: center;

            gap: 18px;

            box-shadow:
                0 5px 20px rgba(0,0,0,.06);

            transition: .3s;

            animation: muncul .7s ease;
        }

        .stat-card:hover {
            transform: translateY(-7px);

            box-shadow:
                0 12px 30px rgba(0,0,0,.12);
        }

        @keyframes muncul {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-icon {
            width: 60px;
            height: 60px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #fff0f6;

            border-radius: 15px;

            font-size: 28px;
        }

        .stat-card h3 {
            font-size: 28px;
            margin-bottom: 4px;
        }

        .stat-card p {
            color: #999;
            font-size: 13px;
        }

        /* PRODUCT TABLE */

        .content-box {
            background: white;

            padding: 25px;

            border-radius: 15px;

            box-shadow:
                0 5px 20px rgba(0,0,0,.05);
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 20px;
        }

        .content-header h2 {
            font-size: 20px;
        }

        .add-button {
            background: #ff3f8e;
            color: white;

            text-decoration: none;

            padding: 10px 18px;

            border-radius: 8px;

            transition: .3s;
        }

        .add-button:hover {
            transform: translateY(-2px);

            box-shadow:
                0 5px 15px rgba(255,63,142,.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 14px;

            text-align: left;

            border-bottom: 1px solid #eee;
        }

        th {
            color: #888;
            font-size: 13px;
        }

        td {
            font-size: 14px;
        }

        .price {
            color: #ff3f8e;
            font-weight: bold;
        }

        .stock {
            background: #e9fff2;
            color: #20a060;

            padding: 5px 10px;

            border-radius: 20px;

            font-size: 12px;
        }

        /* RESPONSIVE */

        @media(max-width: 800px) {

            .sidebar {
                width: 70px;
                padding: 20px 10px;
            }

            .logo {
                font-size: 0;
            }

            .logo:first-letter {
                font-size: 25px;
            }

            .menu a {
                text-align: center;
                font-size: 0;
            }

            .main {
                margin-left: 70px;
            }

            .logout {
                left: 10px;
                right: 10px;
            }

            .logout button {
                font-size: 0;
            }

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>


<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">
        🛒 MiniMarket
    </div>

    <ul class="menu">

        <li>
            <a href="/admin" class="active">
                📊 Dashboard
            </a>
        </li>

        <li>
            <a href="/products">
                📦 Produk
            </a>
        </li>

        <li>
            <a href="#">
                🏷️ Kategori
            </a>
        </li>

        <li>
            <a href="#">
                🛒 Pesanan
            </a>
        </li>

        <li>
            <a href="#">
                👥 Pengguna
            </a>
        </li>

        <li>
            <a href="#">
                💰 Laporan
            </a>
        </li>

        <li>
            <a href="#">
                ⚙️ Pengaturan
            </a>
        </li>

    </ul>


    <div class="logout">

        <form action="/logout" method="POST">

            @csrf

            <button type="submit">
                🚪 Logout
            </button>

        </form>

    </div>

</div>


<!-- MAIN -->

<div class="main">


    <!-- TOPBAR -->

    <div class="topbar">

        <div class="welcome">

            <h1>
                Dashboard Admin 👋
            </h1>

            <p>
                Kelola MiniMarket dengan mudah.
            </p>

        </div>

        <div class="admin">
            👤 Administrator
        </div>

    </div>


    <!-- STATISTICS -->

    <div class="stats">


        <div class="stat-card">

            <div class="stat-icon">
                📦
            </div>

            <div>

                <h3>
                    {{ $totalProduk }}
                </h3>

                <p>
                    Total Produk
                </p>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                📊
            </div>

            <div>

                <h3>
                    {{ $totalStok }}
                </h3>

                <p>
                    Total Stok
                </p>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                🛒
            </div>

            <div>

                <h3>
                    0
                </h3>

                <p>
                    Total Pesanan
                </p>

            </div>

        </div>


        <div class="stat-card">

            <div class="stat-icon">
                👥
            </div>

            <div>

                <h3>
                    1
                </h3>

                <p>
                    Pengguna
                </p>

            </div>

        </div>

    </div>


    <!-- PRODUCT -->

    <div class="content-box">

        <div class="content-header">

            <h2>
                📦 Produk Terbaru
            </h2>

            <a href="/products" class="add-button">
                Lihat Produk →
            </a>

        </div>


        <table>

            <thead>

                <tr>

                    <th>
                        Produk
                    </th>

                    <th>
                        Harga
                    </th>

                    <th>
                        Stok
                    </th>

                    <th>
                        Status
                    </th>

                </tr>

            </thead>


            <tbody>

                @php
                    $products = \App\Models\Product::latest()->take(5)->get();
                @endphp


                @foreach ($products as $product)

                <tr>

                    <td>
                        {{ $product->nama }}
                    </td>

                    <td class="price">
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </td>

                    <td>
                        {{ $product->stok }}
                    </td>

                    <td>

                        @if($product->stok > 0)

                            <span class="stock">
                                ✓ Tersedia
                            </span>

                        @else

                            <span style="color:red;">
                                Habis
                            </span>

                        @endif

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>


</div>

</body>
</html>