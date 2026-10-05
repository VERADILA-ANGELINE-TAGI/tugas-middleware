<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard | MINIGIRL</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            color-scheme: dark;
            --background: #351326;
            --surface: rgba(18, 21, 34, 0.82);
            --surface-light: rgba(255, 255, 255, 0.035);
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
                radial-gradient(ellipse at 78% 6%, rgba(236, 72, 153, 0.24), transparent 28rem),
                radial-gradient(ellipse at 4% 35%, rgba(190, 24, 93, 0.18), transparent 25rem),
                var(--background);
            font-family: 'DM Sans', sans-serif;
        }

        button, a { font: inherit; }
        a { color: inherit; text-decoration: none; }

        .dashboard {
            position: relative;
            isolation: isolate;
            min-height: 100vh;
            padding: 26px clamp(18px, 4vw, 58px) 48px;
            overflow: hidden;
        }

        .dashboard::before {
            position: absolute;
            z-index: -1;
            inset: 0;
            content: '';
            opacity: 0.22;
            background-image: radial-gradient(rgba(255,255,255,.17) .7px, transparent .7px);
            background-size: 23px 23px;
            mask-image: linear-gradient(to bottom, black, transparent 72%);
            pointer-events: none;
        }

        .topbar, .main { width: min(1320px, 100%); margin-inline: auto; }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 46px;
        }

        .brand {
            display: inline-flex;
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
            font-size: .65rem;
            font-weight: 600;
            letter-spacing: .15em;
            text-transform: uppercase;
        }

        .topbar-right { display: flex; align-items: center; gap: 20px; }

        .nav-links { display: flex; align-items: center; gap: 8px; }

        .nav-link {
            padding: 10px 14px;
            color: var(--muted);
            font-size: .88rem;
            transition: color .2s, background .2s;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--text);
            background: rgba(255,255,255,.055);
            border-radius: 11px;
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 11px;
            padding-left: 18px;
            border-left: 1px solid var(--border);
        }

        .avatar {
            display: grid;
            width: 38px;
            height: 38px;
            place-items: center;
            border-radius: 13px;
            color: #171025;
            background: linear-gradient(145deg, #f0abfc, #a78bfa);
            font-family: 'Manrope', sans-serif;
            font-size: .84rem;
            font-weight: 800;
        }

        .user-name { font-size: .83rem; font-weight: 700; }
        .user-role { display: block; margin-top: 2px; color: var(--muted); font-size: .72rem; }

        .hero {
            position: relative;
            display: flex;
            min-height: 298px;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
            padding: clamp(28px, 5vw, 58px);
            margin-bottom: 26px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.11);
            border-radius: 28px;
            background:
                linear-gradient(112deg, rgba(27, 26, 45, .98) 0%, rgba(23, 25, 40, .95) 51%, rgba(35, 29, 63, .88) 100%);
            box-shadow: 0 28px 80px rgba(0,0,0,.32);
        }

        .hero::before {
            position: absolute;
            top: -180px;
            right: 9%;
            width: 480px;
            height: 480px;
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 50%;
            content: '';
            box-shadow: 0 0 0 36px rgba(255,255,255,.018), 0 0 0 76px rgba(255,255,255,.014);
            pointer-events: none;
        }

        .hero::after {
            position: absolute;
            top: 25%;
            right: 18%;
            width: 155px;
            height: 155px;
            border-radius: 50%;
            content: '';
            background: radial-gradient(circle at 30% 25%, #e0caff, #a78bfa 36%, #6944d2 72%);
            box-shadow: inset -18px -24px 40px rgba(25, 9, 78, .55), 0 0 80px rgba(167,139,250,.38);
            animation: planet-float 7s ease-in-out infinite;
            pointer-events: none;
        }

        @keyframes planet-float {
            0%, 100% { transform: translateY(0) rotate(-8deg); }
            50% { transform: translateY(-12px) rotate(4deg); }
        }

        .hero-copy { position: relative; z-index: 1; max-width: 650px; }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            margin: 0 0 15px;
            color: #c4b5fd;
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .18em;
            text-transform: uppercase;
        }

        .eyebrow::before {
            width: 22px;
            height: 1px;
            content: '';
            background: var(--violet);
        }

        h1, h2, h3, p { margin-top: 0; }

        .hero h1 {
            margin-bottom: 12px;
            font-family: 'Manrope', sans-serif;
            font-size: clamp(2.2rem, 5vw, 4rem);
            font-weight: 800;
            letter-spacing: -.07em;
            line-height: 1.03;
        }

        .hero h1 span {
            color: transparent;
            background: linear-gradient(90deg, #b8a2ff, #72e5f4);
            background-clip: text;
            -webkit-background-clip: text;
        }

        .hero-copy > p:not(.eyebrow) {
            max-width: 530px;
            margin-bottom: 23px;
            color: #b5b3c7;
            line-height: 1.7;
        }

        .hero-actions { display: flex; flex-wrap: wrap; gap: 11px; }

        .button-primary, .button-secondary {
            display: inline-flex;
            min-height: 45px;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 0 17px;
            border: 1px solid transparent;
            border-radius: 13px;
            font-size: .85rem;
            font-weight: 700;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .button-primary {
            color: #10111c;
            background: linear-gradient(105deg, #a5f3fc, #b4a0ff);
            box-shadow: 0 10px 26px rgba(142,130,245,.2);
        }

        .button-secondary {
            color: var(--text);
            border-color: rgba(255,255,255,.12);
            background: rgba(255,255,255,.04);
        }

        .button-primary:hover, .button-secondary:hover {
            transform: translateY(-2px);
            color: inherit;
        }

        .button-primary:hover { box-shadow: 0 14px 32px rgba(142,130,245,.34); }
        .button-secondary:hover { background: rgba(255,255,255,.09); }

        .hero-date {
            position: absolute;
            right: 26px;
            bottom: 22px;
            z-index: 1;
            color: rgba(255,255,255,.48);
            font-size: .73rem;
            letter-spacing: .08em;
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 14px;
            margin: 31px 0 15px;
        }

        .section-heading h2 {
            margin: 0;
            font-family: 'Manrope', sans-serif;
            font-size: 1.12rem;
            font-weight: 800;
            letter-spacing: -.03em;
        }

        .section-heading p { margin: 5px 0 0; color: var(--muted); font-size: .8rem; }

        .quiet-label {
            color: #bbb2da;
            font-size: .76rem;
            font-weight: 600;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 16px;
        }

        .stat-card {
            position: relative;
            min-height: 155px;
            padding: 21px 22px;
            overflow: hidden;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: linear-gradient(145deg, rgba(23,27,42,.9), rgba(14,18,29,.88));
            box-shadow: 0 15px 35px rgba(0,0,0,.14);
            transition: transform .25s ease, border-color .25s ease, box-shadow .25s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(167,139,250,.35);
            box-shadow: 0 22px 40px rgba(0,0,0,.26);
        }

        .stat-card::after {
            position: absolute;
            top: -45px;
            right: -28px;
            width: 110px;
            height: 110px;
            border-radius: 50%;
            content: '';
            background: var(--glow, rgba(167,139,250,.12));
            filter: blur(22px);
        }

        .stat-head { display: flex; align-items: center; justify-content: space-between; }
        .stat-label { margin: 0; color: var(--muted); font-size: .78rem; font-weight: 600; }

        .stat-icon {
            display: grid;
            width: 39px;
            height: 39px;
            place-items: center;
            border: 1px solid rgba(255,255,255,.08);
            border-radius: 13px;
            color: var(--icon-color, var(--violet));
            background: rgba(255,255,255,.045);
            font-size: 1rem;
        }

        .stat-value {
            margin: 13px 0 4px;
            font-family: 'Manrope', sans-serif;
            font-size: 2.1rem;
            font-weight: 800;
            letter-spacing: -.06em;
            line-height: 1;
        }

        .stat-foot { color: var(--muted); font-size: .75rem; }

        .content-grid {
            display: grid;
            grid-template-columns: 1.25fr .75fr;
            gap: 16px;
            margin-top: 16px;
        }

        .panel {
            min-width: 0;
            padding: 21px;
            border: 1px solid var(--border);
            border-radius: 20px;
            background: var(--surface);
            box-shadow: 0 15px 40px rgba(0,0,0,.16);
            backdrop-filter: blur(12px);
        }

        .panel-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 17px;
        }

        .panel-head h3 {
            margin: 0;
            font-family: 'Manrope', sans-serif;
            font-size: .94rem;
            font-weight: 800;
        }

        .panel-subtitle { margin: 5px 0 0; color: var(--muted); font-size: .74rem; }

        .stock-list { display: grid; gap: 19px; padding: 9px 0 2px; }

        .stock-row { display: grid; grid-template-columns: 92px 1fr 36px; align-items: center; gap: 12px; }
        .stock-name { color: #d4d2df; font-size: .76rem; }
        .stock-track { height: 7px; border-radius: 999px; background: rgba(255,255,255,.07); overflow: hidden; }
        .stock-fill { width: var(--width); height: 100%; border-radius: inherit; background: var(--fill); animation: grow-bar .8s ease-out both; transform-origin: left; }
        @keyframes grow-bar { from { transform: scaleX(0); } to { transform: scaleX(1); } }
        .stock-count { color: #e7e5ef; font-size: .75rem; font-weight: 700; text-align: right; }

        .stock-note {
            display: flex;
            align-items: center;
            gap: 9px;
            margin-top: 23px;
            padding-top: 15px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: .74rem;
        }

        .stock-note i { color: var(--orange); }

        .product-list { display: grid; }

        .product-row {
            display: grid;
            grid-template-columns: minmax(0, 1fr) auto;
            align-items: center;
            gap: 12px;
            padding: 13px 0;
            border-bottom: 1px solid rgba(255,255,255,.06);
        }

        .product-row:last-child { border-bottom: 0; padding-bottom: 0; }
        .product-row:first-child { padding-top: 3px; }
        .product-name { overflow: hidden; color: #e8e6f0; font-size: .8rem; font-weight: 600; text-overflow: ellipsis; white-space: nowrap; }
        .product-category { margin-top: 4px; color: var(--muted); font-size: .7rem; }

        .stock-pill {
            padding: 6px 9px;
            border: 1px solid rgba(255,255,255,.06);
            border-radius: 999px;
            color: #c5c3d2;
            background: rgba(255,255,255,.04);
            font-size: .7rem;
            font-weight: 700;
            white-space: nowrap;
        }

        .stock-pill.low { color: var(--orange); background: rgba(251,191,114,.08); }
        .stock-pill.zero { color: var(--red); background: rgba(251,113,133,.08); }

        .empty-state {
            display: grid;
            min-height: 124px;
            place-items: center;
            color: var(--muted);
            font-size: .8rem;
            text-align: center;
        }

        .empty-state i { display: block; margin-bottom: 8px; color: #8d83b7; font-size: 1.4rem; }

        .footer-note {
            display: flex;
            justify-content: space-between;
            gap: 14px;
            margin-top: 20px;
            color: #73758a;
            font-size: .7rem;
        }

        @media (max-width: 900px) {
            .hero::after { right: 9%; opacity: .55; }
            .content-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 680px) {
            .dashboard { padding-inline: 14px; }
            .topbar { align-items: flex-start; margin-bottom: 25px; }
            .topbar-right { gap: 8px; }
            .nav-links { display: none; }
            .user-chip { padding-left: 10px; }
            .user-meta { display: none; }
            .hero { min-height: 330px; padding: 27px 23px; align-items: flex-start; }
            .hero::before { top: auto; right: -150px; bottom: -240px; }
            .hero::after { top: auto; right: 12%; bottom: 25px; width: 92px; height: 92px; opacity: .7; }
            .hero-date { right: 16px; bottom: 15px; font-size: .64rem; }
            .stats-grid { grid-template-columns: 1fr; gap: 11px; }
            .stat-card { min-height: 132px; padding: 17px 19px; }
            .stat-value { font-size: 1.9rem; }
            .section-heading { align-items: flex-start; }
            .panel { padding: 18px; }
            .stock-row { grid-template-columns: 82px 1fr 30px; gap: 9px; }
            .footer-note { flex-direction: column; gap: 6px; }
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
    <div class="dashboard">
        <div class="topbar">
            <a class="brand" href="{{ route('dashboard') }}">
                <span class="brand-icon"><i class="bi bi-basket2-fill"></i></span>
                <span>MINIGIRL<span class="brand-caption">Admin workspace</span></span>
            </a>

            <div class="topbar-right">
                <nav class="nav-links" aria-label="Navigasi utama">
                    <a class="nav-link active" href="{{ route('dashboard') }}">Overview</a>
                    <a class="nav-link" href="{{ route('products.index') }}">Produk</a>
                </nav>
                <div class="user-chip">
                    <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                    <div class="user-meta">
                        <span class="user-name">{{ auth()->user()->name }}</span>
                        <span class="user-role">{{ auth()->user()->role ?? 'Pengguna' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <main class="main">
            <section class="hero">
                <div class="hero-copy">
                    <p class="eyebrow">Ringkasan toko</p>
                    <h1>Halo, {{ auth()->user()->name }}.<br><span>Semua terkendali.</span></h1>
                    <p>Pantau inventaris MINIGIRL dalam satu tampilan. Angka di bawah diperbarui langsung dari data produk Anda.</p>
                    <div class="hero-actions">
                        <a class="button-primary" href="{{ route('products.index') }}">
                            <i class="bi bi-box-seam"></i> Kelola produk
                        </a>
                        <a class="button-secondary" href="{{ route('profile.edit') }}">
                            <i class="bi bi-person-gear"></i> Pengaturan akun
                        </a>
                    </div>
                </div>
                <span class="hero-date">{{ now()->translatedFormat('l, d F Y') }}</span>
            </section>

            <div class="section-heading">
                <div>
                    <h2>Ringkasan inventaris</h2>
                    <p>Informasi terkini dari katalog produk toko</p>
                </div>
                <span class="quiet-label"><i class="bi bi-arrow-repeat"></i> Data langsung</span>
            </div>

            <section class="stats-grid" aria-label="Statistik inventaris">
                <article class="stat-card" style="--glow: rgba(167,139,250,.18); --icon-color: #c4b5fd;">
                    <div class="stat-head">
                        <p class="stat-label">Produk terdaftar</p>
                        <span class="stat-icon"><i class="bi bi-box-seam"></i></span>
                    </div>
                    <div class="stat-value">{{ number_format($totalProduk) }}</div>
                    <span class="stat-foot">Jumlah semua produk di katalog</span>
                </article>

                <article class="stat-card" style="--glow: rgba(103,232,249,.15); --icon-color: #67e8f9;">
                    <div class="stat-head">
                        <p class="stat-label">Total unit stok</p>
                        <span class="stat-icon"><i class="bi bi-stack"></i></span>
                    </div>
                    <div class="stat-value">{{ number_format($totalStok) }}</div>
                    <span class="stat-foot">Akumulasi unit seluruh produk</span>
                </article>

                <article class="stat-card" style="--glow: rgba(251,191,114,.16); --icon-color: #fbbf72;">
                    <div class="stat-head">
                        <p class="stat-label">Perlu perhatian</p>
                        <span class="stat-icon"><i class="bi bi-exclamation-triangle"></i></span>
                    </div>
                    <div class="stat-value">{{ number_format($stokRendah) }}</div>
                    <span class="stat-foot">Produk dengan stok 5 unit atau kurang</span>
                </article>
            </section>

            <section class="content-grid">
                <article class="panel">
                    <div class="panel-head">
                        <div>
                            <h3>Kondisi stok</h3>
                            <p class="panel-subtitle">Distribusi produk berdasarkan jumlah stok</p>
                        </div>
                        <span class="quiet-label">{{ number_format($totalProduk) }} produk</span>
                    </div>

                    <div class="stock-list">
                        <div class="stock-row">
                            <span class="stock-name">Stok aman</span>
                            <div class="stock-track">
                                <div class="stock-fill" style="--width: {{ $totalProduk ? ($stokAman / $totalProduk * 100) : 0 }}%; --fill: linear-gradient(90deg, #34d399, #67e8f9);"></div>
                            </div>
                            <span class="stock-count">{{ $stokAman }}</span>
                        </div>
                        <div class="stock-row">
                            <span class="stock-name">Stok menipis</span>
                            <div class="stock-track">
                                <div class="stock-fill" style="--width: {{ $totalProduk ? (($stokRendah - $stokHabis) / $totalProduk * 100) : 0 }}%; --fill: linear-gradient(90deg, #fbbf24, #fb923c);"></div>
                            </div>
                            <span class="stock-count">{{ $stokRendah - $stokHabis }}</span>
                        </div>
                        <div class="stock-row">
                            <span class="stock-name">Stok habis</span>
                            <div class="stock-track">
                                <div class="stock-fill" style="--width: {{ $totalProduk ? ($stokHabis / $totalProduk * 100) : 0 }}%; --fill: linear-gradient(90deg, #fb7185, #f43f5e);"></div>
                            </div>
                            <span class="stock-count">{{ $stokHabis }}</span>
                        </div>
                    </div>

                    <div class="stock-note">
                        <i class="bi bi-info-circle"></i>
                        <span>Produk dengan stok ≤ 5 unit ditandai perlu perhatian.</span>
                    </div>
                </article>

                <article class="panel">
                    <div class="panel-head">
                        <div>
                            <h3>Stok perlu perhatian</h3>
                            <p class="panel-subtitle">Prioritas pengecekan dan restock</p>
                        </div>
                        <i class="bi bi-bell" style="color: var(--orange);"></i>
                    </div>

                    <div class="product-list">
                        @forelse ($produkStokRendah as $product)
                            <div class="product-row">
                                <div>
                                    <div class="product-name">{{ $product->name }}</div>
                                    <div class="product-category">{{ $product->description ?: 'Tanpa keterangan' }}</div>
                                </div>
                                <span class="stock-pill {{ (int) $product->stock === 0 ? 'zero' : 'low' }}">
                                    {{ (int) $product->stock === 0 ? 'Habis' : $product->stock . ' tersisa' }}
                                </span>
                            </div>
                        @empty
                            <div class="empty-state">
                                <div><i class="bi bi-check2-circle"></i>Semua stok produk dalam kondisi aman.</div>
                            </div>
                        @endforelse
                    </div>
                </article>
            </section>

            <section class="panel" style="margin-top: 16px;">
                <div class="panel-head">
                    <div>
                        <h3>Produk terbaru</h3>
                        <p class="panel-subtitle">Produk terakhir yang ditambahkan ke katalog</p>
                    </div>
                    <a class="quiet-label" href="{{ route('products.index') }}">Lihat semua <i class="bi bi-arrow-up-right"></i></a>
                </div>

                <div class="product-list">
                    @forelse ($produkTerbaru as $product)
                        <div class="product-row">
                            <div>
                                <div class="product-name">{{ $product->name }}</div>
                                <div class="product-category">{{ $product->description ?: 'Tanpa keterangan' }} · {{ \Illuminate\Support\Carbon::parse($product->created_at)->diffForHumans() }}</div>
                            </div>
                            <span class="stock-pill {{ (int) $product->stock === 0 ? 'zero' : ((int) $product->stock <= 5 ? 'low' : '') }}">
                                {{ number_format($product->stock) }} unit
                            </span>
                        </div>
                    @empty
                        <div class="empty-state">
                            <div><i class="bi bi-box"></i>Belum ada produk. Tambahkan produk pertama Anda.</div>
                        </div>
                    @endforelse
                </div>
            </section>

            <footer class="footer-note">
                <span>MINIGIRL · Dashboard inventaris</span>
                <span>Terakhir diperbarui {{ now()->format('H:i') }}</span>
            </footer>
        </main>
    </div>
</body>

</html>
