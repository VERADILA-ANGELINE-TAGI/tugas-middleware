<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk | MINIGIRL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            color-scheme: dark;
            --background: #351326;
            --surface: rgba(18, 21, 34, 0.86);
            --border: rgba(255, 255, 255, 0.08);
            --text: #f4f3fb;
            --muted: #9495aa;
            --violet: #a78bfa;
            --cyan: #67e8f9;
            --green: #6ee7b7;
            --orange: #fbbf72;
            --red: #fb7185;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            color: var(--text);
            background:
                radial-gradient(ellipse at 78% 5%, rgba(236, 72, 153, .24), transparent 28rem),
                radial-gradient(ellipse at 4% 44%, rgba(190, 24, 93, .18), transparent 25rem),
                var(--background);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
        }

        body::before {
            position: fixed;
            z-index: -1;
            inset: 0;
            content: '';
            opacity: .2;
            background-image: radial-gradient(rgba(255,255,255,.17) .7px, transparent .7px);
            background-size: 23px 23px;
            mask-image: linear-gradient(to bottom, black, transparent 72%);
            pointer-events: none;
        }

        a { color: inherit; text-decoration: none; }
        button, input { font: inherit; }

        .page {
            position: relative;
            isolation: isolate;
            min-height: 100vh;
            padding: 26px clamp(16px, 4vw, 58px) 44px;
            overflow: hidden;
        }

        .orb {
            position: absolute;
            z-index: -1;
            border-radius: 50%;
            filter: blur(40px);
            pointer-events: none;
            animation: drift 12s ease-in-out infinite;
        }

        .orb-one {
            top: 15%;
            right: 10%;
            width: 220px;
            height: 220px;
            background: rgba(139,109,255,.15);
        }

        .orb-two {
            top: 48%;
            left: -90px;
            width: 240px;
            height: 240px;
            background: rgba(103,232,249,.1);
            animation-delay: 3s;
        }

        @keyframes drift {
            0%, 100% { transform: translate3d(0,0,0); }
            50% { transform: translate3d(0,-18px,0); }
        }

        .topbar, .main, .footer { width: min(1320px, 100%); margin-inline: auto; }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 38px;
        }

        .brand {
            display: inline-flex;
            flex: 0 0 auto;
            align-items: center;
            gap: 12px;
            font-family: 'Manrope', sans-serif;
            font-size: 1rem;
            font-weight: 800;
            letter-spacing: -.03em;
        }

        .brand-icon {
            display: grid;
            width: 42px;
            height: 42px;
            place-items: center;
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 14px;
            color: #0b1118;
            background: linear-gradient(145deg, #a5f3fc, #a78bfa 78%);
            box-shadow: 0 8px 30px rgba(167,139,250,.24);
        }

        .brand-caption {
            display: block;
            margin-top: 1px;
            color: var(--muted);
            font-family: 'DM Sans', sans-serif;
            font-size: .65rem;
            font-weight: 600;
            letter-spacing: .15em;
            text-transform: uppercase;
        }

        .search {
            display: flex;
            width: min(470px, 50vw);
            height: 46px;
            align-items: center;
            gap: 10px;
            padding: 0 14px;
            border: 1px solid var(--border);
            border-radius: 14px;
            background: rgba(255,255,255,.045);
            transition: border-color .2s, box-shadow .2s, background .2s;
        }

        .search:focus-within {
            border-color: rgba(167,139,250,.65);
            background: rgba(255,255,255,.065);
            box-shadow: 0 0 0 4px rgba(167,139,250,.1);
        }

        .search i { color: #b5a1f9; }

        .search input {
            width: 100%;
            border: 0;
            outline: 0;
            color: var(--text);
            background: transparent;
            font-size: .82rem;
        }

        .search input::placeholder { color: #85869a; }

        .top-actions { display: flex; align-items: center; gap: 10px; }

        .nav-link {
            display: inline-flex;
            min-height: 42px;
            align-items: center;
            gap: 8px;
            padding: 0 14px;
            border: 1px solid var(--border);
            border-radius: 13px;
            color: #d1cde0;
            background: rgba(255,255,255,.035);
            font-size: .8rem;
            font-weight: 700;
            transition: background .2s, transform .2s;
        }

        .nav-link:hover {
            transform: translateY(-2px);
            color: white;
            background: rgba(255,255,255,.08);
        }

        .hero {
            position: relative;
            display: flex;
            min-height: 274px;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            padding: clamp(27px, 5vw, 54px);
            margin-bottom: 27px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.11);
            border-radius: 28px;
            background: linear-gradient(112deg, rgba(27,26,45,.98), rgba(23,25,40,.95) 52%, rgba(35,29,63,.9));
            box-shadow: 0 28px 80px rgba(0,0,0,.3);
            animation: arrive .65s ease both;
        }

        @keyframes arrive {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .hero::before {
            position: absolute;
            top: -210px;
            right: 8%;
            width: 470px;
            height: 470px;
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 50%;
            content: '';
            box-shadow: 0 0 0 36px rgba(255,255,255,.018), 0 0 0 76px rgba(255,255,255,.014);
            pointer-events: none;
        }

        .hero::after {
            position: absolute;
            top: 50%;
            right: 17%;
            width: 122px;
            height: 122px;
            border-radius: 50%;
            content: '';
            background: radial-gradient(circle at 30% 25%, #e0caff, #a78bfa 36%, #6944d2 72%);
            box-shadow: inset -17px -22px 36px rgba(25,9,78,.52), 0 0 70px rgba(167,139,250,.35);
            transform: translateY(-50%);
            animation: planet-float 7s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes planet-float {
            0%, 100% { transform: translateY(-50%) rotate(-8deg); }
            50% { transform: translateY(calc(-50% - 10px)) rotate(5deg); }
        }

        .hero-copy { position: relative; z-index: 1; max-width: 680px; }

        .eyebrow {
            display: flex;
            align-items: center;
            gap: 9px;
            margin: 0 0 14px;
            color: #c4b5fd;
            font-size: .7rem;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .eyebrow::before { width: 22px; height: 1px; content: ''; background: var(--violet); }

        h1, h2, h3, p { margin-top: 0; }

        .hero h1 {
            margin-bottom: 12px;
            font-family: 'Manrope', sans-serif;
            font-size: clamp(2.2rem, 5vw, 3.9rem);
            font-weight: 800;
            letter-spacing: -.07em;
            line-height: 1.02;
        }

        .hero h1 span {
            color: transparent;
            background: linear-gradient(90deg, #b8a2ff, #72e5f4);
            background-clip: text;
            -webkit-background-clip: text;
        }

        .hero-copy > p:not(.eyebrow) { max-width: 540px; margin: 0; color: #b5b3c7; line-height: 1.7; }

        .hero-meta {
            position: relative;
            z-index: 1;
            display: flex;
            flex: 0 0 auto;
            flex-direction: column;
            align-items: flex-end;
            gap: 8px;
            color: rgba(255,255,255,.65);
            font-size: .75rem;
        }

        .catalog-count {
            color: white;
            font-family: 'Manrope', sans-serif;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -.06em;
        }

        .section-head {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 16px;
            margin: 34px 0 17px;
        }

        .section-head h2 {
            margin: 0;
            font-family: 'Manrope', sans-serif;
            font-size: 1.2rem;
            font-weight: 800;
            letter-spacing: -.04em;
        }

        .section-head p { margin: 5px 0 0; color: var(--muted); font-size: .78rem; }
        .result-count { color: #c6c1d5; font-size: .77rem; }
        .result-count strong { color: #d9cbff; }
        .catalog-actions { display: flex; align-items: center; flex-wrap: wrap; gap: 10px; }
        .status-message {
            margin-bottom: 18px;
            padding: 12px 15px;
            border: 1px solid rgba(110,231,183,.2);
            border-radius: 13px;
            color: #a7f3d0;
            background: rgba(16,185,129,.09);
            font-size: .84rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 17px;
        }

        .product-card {
            position: relative;
            min-width: 0;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: linear-gradient(145deg, rgba(23,27,42,.94), rgba(13,17,28,.96));
            box-shadow: 0 15px 35px rgba(0,0,0,.15);
            animation: card-in .55s ease both;
            transition: transform .28s ease, border-color .28s ease, box-shadow .28s ease;
        }

        .product-card:hover {
            transform: translateY(-7px);
            border-color: rgba(167,139,250,.38);
            box-shadow: 0 24px 48px rgba(0,0,0,.34);
        }

        @keyframes card-in {
            from { opacity: 0; transform: translateY(18px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .product-art {
            position: relative;
            display: grid;
            height: 188px;
            place-items: center;
            overflow: hidden;
            border-bottom: 1px solid rgba(255,255,255,.06);
            background:
                radial-gradient(circle at 50% 42%, rgba(167,139,250,.17), transparent 38%),
                linear-gradient(145deg, rgba(40,37,61,.9), rgba(17,23,37,.95));
        }

        .product-image {
            position: absolute;
            z-index: 1;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform .4s ease;
        }

        .product-card:hover .product-image { transform: scale(1.04); }

        .product-art::before {
            position: absolute;
            inset: 0;
            content: '';
            opacity: .32;
            background-image: linear-gradient(rgba(255,255,255,.035) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.035) 1px, transparent 1px);
            background-size: 22px 22px;
            mask-image: radial-gradient(circle, black, transparent 82%);
        }

        .product-art::after {
            position: absolute;
            width: 114px;
            height: 114px;
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 50%;
            content: '';
            box-shadow: 0 0 0 15px rgba(255,255,255,.025), 0 0 32px rgba(167,139,250,.11);
            transition: transform .35s ease;
        }

        .product-card:hover .product-art::after { transform: scale(1.12); }

        .product-symbol {
            position: relative;
            z-index: 1;
            display: grid;
            width: 76px;
            height: 76px;
            place-items: center;
            border: 1px solid rgba(255,255,255,.14);
            border-radius: 25px;
            color: #e4d9ff;
            background: linear-gradient(145deg, rgba(195,174,255,.24), rgba(103,232,249,.09));
            box-shadow: 0 15px 36px rgba(0,0,0,.22), inset 0 1px rgba(255,255,255,.16);
            font-size: 2rem;
            transform: rotate(-7deg);
            transition: transform .35s ease;
        }

        .product-card:hover .product-symbol { transform: rotate(0) scale(1.08); }

        .product-status {
            position: absolute;
            z-index: 2;
            top: 13px;
            left: 13px;
            padding: 6px 9px;
            border: 1px solid rgba(110,231,183,.14);
            border-radius: 999px;
            color: var(--green);
            background: rgba(9,15,22,.64);
            font-size: .66rem;
            font-weight: 700;
            backdrop-filter: blur(8px);
        }

        .product-status.low {
            color: var(--orange);
            border-color: rgba(251,191,114,.16);
        }

        .product-status.empty {
            color: var(--red);
            border-color: rgba(251,113,133,.16);
        }

        .product-info { padding: 17px; }

        .product-name {
            display: -webkit-box;
            min-height: 42px;
            overflow: hidden;
            color: #f0eef8;
            font-family: 'Manrope', sans-serif;
            font-size: .91rem;
            font-weight: 700;
            line-height: 1.45;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .product-description {
            display: -webkit-box;
            min-height: 34px;
            margin: 7px 0 12px;
            overflow: hidden;
            color: var(--muted);
            font-size: .72rem;
            line-height: 1.55;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .product-bottom {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 10px;
            padding-top: 12px;
            border-top: 1px solid rgba(255,255,255,.07);
        }

        .price-label { display: block; margin-bottom: 3px; color: var(--muted); font-size: .64rem; }

        .price {
            color: #d7c9ff;
            font-family: 'Manrope', sans-serif;
            font-size: 1.05rem;
            font-weight: 800;
            letter-spacing: -.03em;
            white-space: nowrap;
        }

        .stock {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            color: #a8a5b8;
            font-size: .68rem;
            white-space: nowrap;
        }

        .empty-state {
            display: none;
            padding: 66px 20px;
            border: 1px dashed rgba(255,255,255,.13);
            border-radius: 22px;
            color: var(--muted);
            text-align: center;
        }

        .empty-state i { display: block; margin-bottom: 12px; color: #b5a1f9; font-size: 2rem; }
        .empty-state strong { display: block; margin-bottom: 5px; color: var(--text); }

        .footer {
            display: flex;
            justify-content: space-between;
            gap: 16px;
            margin-top: 34px;
            padding-top: 18px;
            border-top: 1px solid rgba(255,255,255,.07);
            color: #77788d;
            font-size: .72rem;
        }

        @media (max-width: 1050px) {
            .product-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
        }

        @media (max-width: 760px) {
            .topbar { flex-wrap: wrap; margin-bottom: 25px; }
            .search { order: 3; width: 100%; }
            .hero { min-height: 260px; align-items: flex-start; flex-direction: column; }
            .hero::before { right: -180px; }
            .hero::after { top: auto; right: 12%; bottom: 24px; width: 82px; height: 82px; opacity: .65; transform: none; }
            .hero-meta { align-items: flex-start; }
            .catalog-count { font-size: 1.35rem; }
            .product-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px; }
            .product-art { height: 155px; }
            .product-info { padding: 13px; }
        }

        @media (max-width: 430px) {
            .top-actions .nav-link { padding-inline: 10px; font-size: .74rem; }
            .product-grid { grid-template-columns: 1fr; }
            .product-art { height: 190px; }
            .section-head { align-items: flex-start; flex-direction: column; }
            .footer { flex-direction: column; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                scroll-behavior: auto !important;
                transition-duration: .01ms !important;
            }
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="orb orb-one"></div>
        <div class="orb orb-two"></div>

        <header class="topbar">
            <a class="brand" href="{{ url('/') }}">
                <span class="brand-icon"><i class="bi bi-basket2-fill"></i></span>
                <span>MINIGIRL<span class="brand-caption">Daily essentials</span></span>
            </a>

            <label class="search">
                <i class="bi bi-search"></i>
                <input id="product-search" type="search" placeholder="Cari nama atau deskripsi produk..." autocomplete="off" aria-label="Cari produk">
            </label>

            <nav class="top-actions" aria-label="Navigasi">
                <a class="nav-link" href="{{ route('kasir') }}"><i class="bi bi-receipt-cutoff"></i> Buka kasir</a>
                @auth
                    <a class="nav-link" href="{{ route('dashboard') }}"><i class="bi bi-grid-1x2"></i> Dashboard</a>
                @else
                    <a class="nav-link" href="{{ route('login') }}"><i class="bi bi-person"></i> Masuk</a>
                @endauth
            </nav>
        </header>

        <main class="main">
            <section class="hero">
                <div class="hero-copy">
                    <p class="eyebrow">Pilihan harian Anda</p>
                    <h1>Belanja mudah.<br><span>Hari jadi lebih ringan.</span></h1>
                    <p>Temukan kebutuhan pilihan dengan harga yang jelas dan informasi stok terkini.</p>
                </div>
                <div class="hero-meta">
                    <span class="catalog-count">{{ number_format($products->count()) }} produk</span>
                    <span>tersedia di katalog</span>
                </div>
            </section>

            <section aria-labelledby="catalog-title">
                @if (session('status'))
                    <div class="status-message" role="status">{{ session('status') }}</div>
                @endif
                <div class="section-head">
                    <div>
                        <h2 id="catalog-title">Jelajahi produk</h2>
                        <p>Pilihan kebutuhan sehari-hari dari MINIGIRL</p>
                    </div>
                    <div class="catalog-actions">
                        <span class="result-count"><strong id="visible-count">{{ $products->count() }}</strong> produk ditampilkan</span>
                        @if ($canManageProducts)
                            <a class="nav-link" href="{{ route('products.create') }}"><i class="bi bi-plus-lg"></i> Tambah produk</a>
                        @endif
                        <a class="nav-link" href="{{ route('kasir') }}"><i class="bi bi-arrow-right-circle"></i> Ke kasir</a>
                    </div>
                </div>

                @if ($products->isNotEmpty())
                    <div class="product-grid" id="product-grid">
                        @foreach ($products as $product)
                            <article
                                class="product-card"
                                data-search="{{ mb_strtolower($product->nama . ' ' . ($product->deskripsi ?? '')) }}"
                                style="animation-delay: {{ min($loop->index * 65, 520) }}ms"
                            >
                                <div class="product-art">
                                    @if ((int) $product->stok < 1)
                                        <span class="product-status empty">Stok habis</span>
                                    @elseif ((int) $product->stok <= 5)
                                        <span class="product-status low">Stok menipis</span>
                                    @else
                                        <span class="product-status">Tersedia</span>
                                    @endif
                                    @if (!empty($product->image_url))
                                        <img class="product-image" src="{{ $product->image_url }}" alt="{{ $product->nama }}" loading="lazy">
                                    @else
                                        <span class="product-symbol" aria-hidden="true"><i class="bi bi-box-seam"></i></span>
                                    @endif
                                </div>

                                <div class="product-info">
                                    <div class="product-name">{{ $product->nama }}</div>
                                    <p class="product-description">{{ $product->deskripsi ?: 'Produk pilihan untuk kebutuhan sehari-hari.' }}</p>
                                    <div class="product-bottom">
                                        <div>
                                            <span class="price-label">Harga</span>
                                            <span class="price">Rp {{ number_format($product->harga, 0, ',', '.') }}</span>
                                        </div>
                                        <span class="stock"><i class="bi bi-box"></i>{{ number_format($product->stok) }} unit</span>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>

                    <div class="empty-state" id="no-results">
                        <div><i class="bi bi-search"></i><strong>Produk tidak ditemukan</strong>Coba kata kunci lain.</div>
                    </div>
                @else
                    <div class="empty-state" style="display: block;">
                        <div><i class="bi bi-box-seam"></i><strong>Belum ada produk</strong>Produk akan muncul di sini setelah ditambahkan ke katalog.</div>
                    </div>
                @endif
            </section>
        </main>

        <footer class="footer">
            <span>© {{ now()->year }} MINIGIRL</span>
            <span>Belanja mudah · Cepat · Hemat</span>
        </footer>
    </div>

    <script>
        const searchInput = document.getElementById('product-search');
        const productCards = Array.from(document.querySelectorAll('.product-card'));
        const resultCount = document.getElementById('visible-count');
        const noResults = document.getElementById('no-results');

        searchInput?.addEventListener('input', () => {
            const query = searchInput.value.trim().toLocaleLowerCase('id');
            let visible = 0;

            productCards.forEach((card) => {
                const matches = card.dataset.search.includes(query);
                card.hidden = !matches;
                visible += matches ? 1 : 0;
            });

            resultCount.textContent = visible;
            noResults.style.display = visible === 0 ? 'block' : 'none';
        });
    </script>
</body>

</html>
