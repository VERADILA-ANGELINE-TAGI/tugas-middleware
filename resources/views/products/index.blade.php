<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MiniMarket ✨</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f8f8f8;
            color: #333;
            overflow-x: hidden;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            background: linear-gradient(120deg, #ee4d2d, #ff7337, #ff9a5c);
            padding: 18px 7%;
            color: white;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 4px 20px rgba(238, 77, 45, .25);
        }

        .nav-content {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .logo {
            font-size: 27px;
            font-weight: bold;
            white-space: nowrap;
            animation: logoBounce 2s infinite;
        }

        @keyframes logoBounce {
            0%,100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-4px);
            }
        }

        .search-box {
            flex: 1;
            display: flex;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,.15);
            transition: .3s;
        }

        .search-box:focus-within {
            transform: scale(1.02);
            box-shadow: 0 0 0 4px rgba(255,255,255,.3);
        }

        .search-box input {
            flex: 1;
            border: none;
            outline: none;
            padding: 14px 18px;
            font-size: 14px;
        }

        .search-box button {
            width: 60px;
            border: none;
            background: #ee4d2d;
            color: white;
            font-size: 20px;
            cursor: pointer;
            transition: .3s;
        }

        .search-box button:hover {
            background: #d9361e;
            transform: scale(1.1);
        }

        .cart {
            font-size: 27px;
            cursor: pointer;
            transition: .3s;
        }

        .cart:hover {
            transform: scale(1.25) rotate(-10deg);
        }


        /* ================= HERO ================= */

        .hero {
            max-width: 1200px;
            margin: 30px auto;
            padding: 50px;
            border-radius: 20px;

            background:
                linear-gradient(
                    120deg,
                    rgba(238,77,45,.95),
                    rgba(255,150,90,.95)
                );

            color: white;

            display: flex;
            align-items: center;
            justify-content: space-between;

            overflow: hidden;
            position: relative;

            box-shadow: 0 15px 40px rgba(238,77,45,.25);

            animation: heroIn .8s ease;
        }

        @keyframes heroIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero h1 {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .hero p {
            font-size: 17px;
            opacity: .95;
        }

        .hero-icon {
            font-size: 110px;
            animation: float 3s ease-in-out infinite;
            filter: drop-shadow(0 10px 10px rgba(0,0,0,.15));
        }

        @keyframes float {
            0%,100% {
                transform: translateY(0) rotate(0);
            }

            50% {
                transform: translateY(-15px) rotate(5deg);
            }
        }

        .circle {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: rgba(255,255,255,.08);
            right: -50px;
            top: -50px;
        }


        /* ================= CATEGORY ================= */

        .category {
            max-width: 1200px;
            margin: 25px auto;
            background: white;
            padding: 25px;
            border-radius: 18px;
            box-shadow: 0 5px 20px rgba(0,0,0,.05);

            animation: fadeUp .8s ease;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(25px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .category h2 {
            margin-bottom: 20px;
        }

        .category-list {
            display: flex;
            justify-content: space-around;
            gap: 20px;
        }

        .category-item {
            text-align: center;
            cursor: pointer;
            transition: .3s;
        }

        .category-item:hover {
            transform: translateY(-8px);
        }

        .category-icon {
            width: 70px;
            height: 70px;
            border-radius: 50%;

            background: linear-gradient(
                135deg,
                #fff1ed,
                #ffe0d6
            );

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 32px;

            margin: auto auto 8px;

            transition: .3s;
        }

        .category-item:hover .category-icon {
            transform: rotate(10deg) scale(1.15);
            box-shadow: 0 8px 20px rgba(238,77,45,.2);
        }


        /* ================= PRODUCTS ================= */

        .products {
            max-width: 1200px;
            margin: 35px auto 60px;
        }

        .products-title {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .products-title h2 {
            font-size: 25px;
        }

        .products-title span {
            color: #ee4d2d;
            cursor: pointer;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 18px;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;

            box-shadow: 0 4px 15px rgba(0,0,0,.06);

            transition: .35s;

            animation: cardIn .7s ease both;
        }

        .product-card:nth-child(1) {
            animation-delay: .1s;
        }

        .product-card:nth-child(2) {
            animation-delay: .2s;
        }

        .product-card:nth-child(3) {
            animation-delay: .3s;
        }

        .product-card:nth-child(4) {
            animation-delay: .4s;
        }

        .product-card:nth-child(5) {
            animation-delay: .5s;
        }

        @keyframes cardIn {
            from {
                opacity: 0;
                transform: translateY(30px) scale(.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .product-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 35px rgba(0,0,0,.13);
        }

        .product-image {
            height: 180px;

            background: linear-gradient(
                135deg,
                #fff3ee,
                #ffe0d6
            );

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 75px;

            transition: .4s;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-size: 15px;
            font-weight: 500;
            min-height: 38px;
        }

        .price {
            color: #ee4d2d;
            font-size: 20px;
            font-weight: bold;
            margin: 8px 0;
        }

        .stock {
            color: #999;
            font-size: 12px;
            margin-bottom: 12px;
        }

        .buy-button {
            width: 100%;
            padding: 10px;

            border: 1px solid #ee4d2d;
            border-radius: 8px;

            background: white;
            color: #ee4d2d;

            cursor: pointer;

            font-weight: bold;

            transition: .3s;
        }

        .buy-button:hover {
            background: #ee4d2d;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(238,77,45,.25);
        }


        /* ================= FOOTER ================= */

        footer {
            background: #292929;
            color: white;
            text-align: center;
            padding: 30px;
        }


        /* ================= FLOATING EMOJI ================= */

        .floating {
            position: fixed;
            pointer-events: none;
            opacity: .15;
            font-size: 35px;
            animation: floating 8s linear infinite;
        }

        .f1 {
            left: 5%;
            bottom: -50px;
        }

        .f2 {
            left: 25%;
            bottom: -50px;
            animation-delay: 2s;
        }

        .f3 {
            right: 20%;
            bottom: -50px;
            animation-delay: 4s;
        }

        @keyframes floating {
            from {
                transform: translateY(0) rotate(0);
            }

            to {
                transform: translateY(-100vh) rotate(360deg);
            }
        }


        /* ================= RESPONSIVE ================= */

        @media(max-width: 900px) {

            .product-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .hero {
                margin: 20px;
            }

            .category,
            .products {
                margin-left: 20px;
                margin-right: 20px;
            }
        }

        @media(max-width: 600px) {

            .nav-content {
                flex-wrap: wrap;
            }

            .search-box {
                order: 3;
                flex-basis: 100%;
            }

            .hero {
                padding: 30px;
            }

            .hero h1 {
                font-size: 28px;
            }

            .hero-icon {
                display: none;
            }

            .category-list {
                flex-wrap: wrap;
            }

            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

    </style>
</head>


<body>


    <!-- FLOATING DECORATION -->

    <div class="floating f1">🛒</div>
    <div class="floating f2">🍜</div>
    <div class="floating f3">🛍️</div>


    <!-- NAVBAR -->

    <nav class="navbar">

        <div class="nav-content">

            <div class="logo">
                🛒 MiniMarket
            </div>

            <div class="search-box">

                <input
                    type="text"
                    placeholder="Cari produk yang kamu inginkan..."
                >

                <button>
                    🔍
                </button>

            </div>

            <div class="cart">
                🛍️
            </div>

        </div>

    </nav>


    <!-- HERO -->

    <section class="hero">

        <div class="circle"></div>

        <div>

            <h1>
                Belanja Mudah & Hemat ✨
            </h1>

            <p>
                Temukan berbagai kebutuhan sehari-hari
                dengan harga terbaik!
            </p>

        </div>

        <div class="hero-icon">
            🛒
        </div>

    </section>


    <!-- CATEGORY -->

    <section class="category">

        <h2>
            🏷️ Kategori
        </h2>

        <div class="category-list">

            <div class="category-item">
                <div class="category-icon">
                    🍜
                </div>
                <p>Makanan</p>
            </div>

            <div class="category-item">
                <div class="category-icon">
                    🥤
                </div>
                <p>Minuman</p>
            </div>

            <div class="category-item">
                <div class="category-icon">
                    🧴
                </div>
                <p>Perawatan</p>
            </div>

            <div class="category-item">
                <div class="category-icon">
                    🧹
                </div>
                <p>Rumah</p>
            </div>

            <div class="category-item">
                <div class="category-icon">
                    🍪
                </div>
                <p>Snack</p>
            </div>

        </div>

    </section>


    <!-- PRODUCTS -->

    <section class="products">

        <div class="products-title">

            <h2>
                🔥 Produk Terbaru
            </h2>

            <span>
                Lihat Semua →
            </span>

        </div>


        <div class="product-grid">

            @foreach ($products as $product)

                <div class="product-card">

                    <div class="product-image">
                        🍜
                    </div>

                    <div class="product-info">

                        <div class="product-name">

                            {{ $product->nama }}

                        </div>


                        <div class="price">

                            Rp
                            {{ number_format($product->harga, 0, ',', '.') }}

                        </div>


                        <div class="stock">

                            📦 Stok tersedia:
                            {{ $product->stok }}

                        </div>


                        <button class="buy-button">

                            🛒 + Keranjang

                        </button>

                    </div>

                </div>

            @endforeach

        </div>

    </section>


    <!-- FOOTER -->

    <footer>

        <p>
            🛒 MiniMarket
        </p>

        <br>

        <p>
            Belanja mudah • Cepat • Hemat ✨
        </p>

        <br>

        <small>
            © 2026 MiniMarket
        </small>

    </footer>


</body>
</html>