<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#f6f8ff">
    <title>MINIGIRL | Belanja Harian Lebih Mudah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        :root {
            color-scheme: light;
            --ink: #17213a;
            --muted: #667085;
            --blue: #315cf5;
            --blue-dark: #2448ce;
            --line: #e8ebf4;
            --surface: #fff;
            --background: #fff0f6;
        }

        * { box-sizing: border-box; }

        html { scroll-behavior: smooth; }

        body {
            min-width: 320px;
            margin: 0;
            color: var(--ink);
            background:
                radial-gradient(ellipse at 88% 10%, rgba(244, 114, 182, .18), transparent 32rem),
                var(--background);
            font-family: 'DM Sans', sans-serif;
        }

        a { color: inherit; text-decoration: none; }

        .container { width: min(1180px, calc(100% - 40px)); margin-inline: auto; }

        .site-header { padding: 18px 0; }

        .header-inner { display: flex; align-items: center; justify-content: space-between; gap: 20px; }

        .brand { display: inline-flex; align-items: center; gap: 11px; font-family: Manrope, sans-serif; font-size: 1.1rem; font-weight: 800; }

        .brand-mark {
            display: grid;
            width: 43px;
            height: 43px;
            place-items: center;
            border-radius: 14px;
            color: #fff;
            background: linear-gradient(145deg, #5d7cff, #315cf5);
            box-shadow: 0 9px 22px rgba(49, 92, 245, .24);
            font-size: 1.2rem;
        }

        .brand small { display: block; margin-top: 1px; color: var(--muted); font: 600 .63rem 'DM Sans', sans-serif; letter-spacing: .14em; text-transform: uppercase; }

        .header-actions { display: flex; align-items: center; gap: 10px; }

        .button {
            display: inline-flex;
            min-height: 45px;
            align-items: center;
            justify-content: center;
            gap: 9px;
            padding: 0 17px;
            border: 1px solid transparent;
            border-radius: 13px;
            font-size: .88rem;
            font-weight: 700;
            transition: transform .2s ease, box-shadow .2s ease, background .2s ease;
        }

        .button:hover { transform: translateY(-2px); }
        .button-primary { color: #fff; background: var(--blue); box-shadow: 0 9px 20px rgba(49, 92, 245, .2); }
        .button-primary:hover { color: #fff; background: var(--blue-dark); box-shadow: 0 12px 24px rgba(49, 92, 245, .25); }
        .button-light { border-color: var(--line); color: var(--ink); background: #fff; }
        .button-light:hover { color: var(--blue); background: #f9faff; }

        .hero {
            position: relative;
            display: grid;
            min-height: 430px;
            grid-template-columns: 1.05fr .95fr;
            align-items: center;
            gap: 30px;
            padding: clamp(30px, 6vw, 68px);
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.7);
            border-radius: 30px;
            background: linear-gradient(118deg, #fff 14%, #f1f4ff 100%);
            box-shadow: 0 22px 65px rgba(42, 62, 130, .09);
            animation: enter .65s ease both;
        }

        .hero::before, .hero::after { position: absolute; border-radius: 50%; content: ''; pointer-events: none; }

        .hero::before {
            top: -170px;
            right: -110px;
            width: 430px;
            height: 430px;
            border: 1px solid rgba(49, 92, 245, .12);
            box-shadow: 0 0 0 32px rgba(49, 92, 245, .025), 0 0 0 68px rgba(49, 92, 245, .02);
        }

        .hero-copy { position: relative; z-index: 1; max-width: 590px; }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 17px;
            padding: 8px 11px;
            border: 1px solid #e0e7ff;
            border-radius: 999px;
            color: var(--blue-dark);
            background: #fff;
            font-size: .73rem;
            font-weight: 700;
        }

        .eyebrow i { color: #20a778; }

        h1, h2, h3, p { margin-top: 0; }

        .hero h1 {
            margin-bottom: 16px;
            font-family: Manrope, sans-serif;
            font-size: clamp(2.5rem, 5.6vw, 4.45rem);
            font-weight: 800;
            letter-spacing: -.075em;
            line-height: 1.04;
        }

        .hero h1 span { color: var(--blue); }
        .hero-copy > p { max-width: 490px; margin-bottom: 23px; color: var(--muted); font-size: 1.05rem; line-height: 1.75; }
        .hero-buttons { display: flex; flex-wrap: wrap; gap: 11px; }

        .hero-visual { position: relative; display: grid; min-height: 290px; place-items: center; }

        .visual-orbit {
            position: absolute;
            width: min(330px, 80vw);
            aspect-ratio: 1;
            border: 1px solid rgba(49, 92, 245, .14);
            border-radius: 50%;
            background: radial-gradient(circle at 48% 45%, #fff 0, rgba(255,255,255,.8) 36%, rgba(225,232,255,.56) 69%, transparent 70%);
            box-shadow: 0 22px 50px rgba(56, 79, 159, .1);
        }

        .cart-figure {
            position: relative;
            z-index: 1;
            display: grid;
            width: 176px;
            height: 176px;
            place-items: center;
            border: 1px solid rgba(255,255,255,.8);
            border-radius: 42px;
            color: var(--blue);
            background: linear-gradient(145deg, rgba(255,255,255,.95), rgba(222,230,255,.93));
            box-shadow: 15px 22px 45px rgba(55, 78, 155, .17), inset 0 2px 5px #fff;
            font-size: 5.8rem;
            transform: rotate(-7deg);
            animation: float 5s ease-in-out infinite;
        }

        .floating-label {
            position: absolute;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 11px 14px;
            border: 1px solid rgba(232,235,244,.85);
            border-radius: 14px;
            color: #38435b;
            background: rgba(255,255,255,.9);
            box-shadow: 0 12px 30px rgba(35, 53, 111, .1);
            font-size: .77rem;
            font-weight: 700;
            backdrop-filter: blur(10px);
        }

        .floating-label i { color: #23a877; font-size: 1.05rem; }
        .label-top { top: 17%; right: -1%; }
        .label-bottom { bottom: 13%; left: 1%; }

        .benefit-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 14px; margin: 22px 0 52px; }

        .benefit {
            display: flex;
            align-items: center;
            gap: 13px;
            padding: 18px;
            border: 1px solid var(--line);
            border-radius: 17px;
            background: rgba(255,255,255,.8);
        }

        .benefit-icon {
            display: grid;
            width: 42px;
            height: 42px;
            flex: 0 0 auto;
            place-items: center;
            border-radius: 13px;
            color: var(--blue);
            background: #eef2ff;
            font-size: 1.05rem;
        }

        .benefit strong { display: block; margin-bottom: 3px; font-size: .85rem; }
        .benefit span { display: block; color: var(--muted); font-size: .73rem; }

        .featured { padding-bottom: 52px; }

        .section-heading { display: flex; align-items: end; justify-content: space-between; gap: 20px; margin-bottom: 20px; }
        .section-heading h2 { margin-bottom: 5px; font-family: Manrope, sans-serif; font-size: clamp(1.5rem, 3vw, 2rem); font-weight: 800; letter-spacing: -.055em; }
        .section-heading p { margin: 0; color: var(--muted); }
        .text-link { display: inline-flex; align-items: center; gap: 7px; color: var(--blue); font-size: .86rem; font-weight: 700; }

        .feature-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 17px; }

        .feature-card {
            position: relative;
            display: flex;
            min-height: 190px;
            flex-direction: column;
            justify-content: space-between;
            padding: 22px;
            overflow: hidden;
            border: 1px solid var(--line);
            border-radius: 20px;
            background: #fff;
            box-shadow: 0 12px 35px rgba(42, 62, 130, .045);
            transition: transform .22s ease, box-shadow .22s ease;
        }

        .feature-card:hover { transform: translateY(-4px); box-shadow: 0 18px 38px rgba(42, 62, 130, .1); }
        .feature-card::after { position: absolute; top: -38px; right: -28px; width: 125px; height: 125px; border-radius: 50%; content: ''; background: #f0f3ff; }
        .feature-icon { position: relative; z-index: 1; display: grid; width: 53px; height: 53px; place-items: center; border-radius: 16px; background: #eef2ff; font-size: 1.8rem; }
        .feature-card h3 { position: relative; z-index: 1; margin: 18px 0 5px; font-family: Manrope, sans-serif; font-size: 1rem; font-weight: 800; }
        .feature-card p { position: relative; z-index: 1; margin: 0; color: var(--muted); font-size: .8rem; line-height: 1.5; }

        .site-footer { padding: 22px 0 28px; border-top: 1px solid var(--line); color: var(--muted); font-size: .78rem; }
        .footer-inner { display: flex; justify-content: space-between; gap: 12px; }

        @keyframes enter { from { opacity: 0; transform: translateY(13px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes float { 0%, 100% { transform: translateY(0) rotate(-7deg); } 50% { transform: translateY(-10px) rotate(-2deg); } }

        @media (max-width: 760px) {
            .hero { grid-template-columns: 1fr; padding: 35px 27px; }
            .hero-visual { min-height: 255px; }
            .hero::before { top: 39%; right: -180px; }
            .benefit-row { grid-template-columns: 1fr; margin-bottom: 38px; }
            .benefit { padding: 14px; }
            .feature-grid { grid-template-columns: 1fr; }
            .feature-card { min-height: 155px; }
        }

        @media (max-width: 480px) {
            .container { width: min(100% - 28px, 1180px); }
            .site-header { padding: 13px 0; }
            .brand { font-size: .95rem; }
            .brand-mark { width: 39px; height: 39px; }
            .header-actions .button { min-height: 40px; padding-inline: 12px; font-size: .78rem; }
            .hero { min-height: auto; padding: 29px 21px 18px; border-radius: 22px; }
            .hero h1 { font-size: 2.55rem; }
            .hero-copy > p { font-size: .92rem; }
            .hero-visual { min-height: 225px; }
            .cart-figure { width: 140px; height: 140px; border-radius: 34px; font-size: 4.8rem; }
            .floating-label { padding: 9px 11px; font-size: .68rem; }
            .label-top { right: -2%; }
            .section-heading { align-items: flex-start; flex-direction: column; }
            .footer-inner { flex-direction: column; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation-duration: .01ms !important; animation-iteration-count: 1 !important; scroll-behavior: auto !important; transition-duration: .01ms !important; }
        }
    </style>
</head>

<body>
    <header class="site-header">
        <div class="container header-inner">
            <a class="brand" href="{{ url('/') }}">
                <span class="brand-mark"><i class="bi bi-basket2-fill"></i></span>
                <span>MINIGIRL<small>Minimarket</small></span>
            </a>
            <nav class="header-actions" aria-label="Navigasi utama">
                <a class="button button-light" href="{{ route('products.index') }}"><i class="bi bi-grid"></i><span>Produk</span></a>
                @auth
                    @if (in_array(auth()->user()->role, ['admin', 'kasir'], true))
                        <a class="button button-primary" href="{{ route('kasir') }}"><i class="bi bi-receipt-cutoff"></i><span>Masuk kasir</span></a>
                    @else
                        <a class="button button-primary" href="{{ route('dashboard') }}"><i class="bi bi-grid-1x2"></i><span>Dashboard</span></a>
                    @endif
                @else
                    <a class="button button-primary" href="{{ route('login') }}"><i class="bi bi-person"></i><span>Login</span></a>
                @endauth
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="hero">
            <div class="hero-copy">
                <span class="eyebrow"><i class="bi bi-patch-check-fill"></i> Kebutuhan harian, tanpa ribet</span>
                <h1>Belanja lebih mudah,<br><span>hari lebih ringan.</span></h1>
                <p>Temukan kebutuhan sehari-hari pilihan di MINIGIRL. Lihat katalog, cek ketersediaan, lalu lanjutkan dengan mudah.</p>
                <div class="hero-buttons">
                    <a class="button button-primary" href="{{ route('products.index') }}"><i class="bi bi-bag"></i> Jelajahi produk</a>
                    @auth
                        @if (in_array(auth()->user()->role, ['admin', 'kasir'], true))
                            <a class="button button-light" href="{{ route('kasir') }}"><i class="bi bi-arrow-up-right"></i> Buka kasir</a>
                        @else
                            <a class="button button-light" href="{{ route('dashboard') }}"><i class="bi bi-grid-1x2"></i> Dashboard</a>
                        @endif
                    @else
                        <a class="button button-light" href="{{ route('login') }}"><i class="bi bi-box-arrow-in-right"></i> Masuk akun</a>
                    @endauth
                </div>
            </div>

            <div class="hero-visual" aria-label="Ilustrasi keranjang belanja">
                <div class="visual-orbit"></div>
                <div class="cart-figure"><i class="bi bi-cart3"></i></div>
                <div class="floating-label label-top"><i class="bi bi-check-circle-fill"></i> Belanja praktis</div>
                <div class="floating-label label-bottom"><i class="bi bi-lightning-charge-fill"></i> Cepat dan mudah</div>
            </div>
        </section>

        <section class="benefit-row" aria-label="Keunggulan MINIGIRL">
            <article class="benefit">
                <span class="benefit-icon"><i class="bi bi-box-seam"></i></span>
                <span><strong>Produk pilihan</strong><span>Kebutuhan harian dalam satu tempat</span></span>
            </article>
            <article class="benefit">
                <span class="benefit-icon"><i class="bi bi-search"></i></span>
                <span><strong>Mudah ditemukan</strong><span>Cari produk lewat katalog</span></span>
            </article>
            <article class="benefit">
                <span class="benefit-icon"><i class="bi bi-receipt"></i></span>
                <span><strong>Kasir siap digunakan</strong><span>Akses transaksi sesuai akun Anda</span></span>
            </article>
        </section>

        <section class="featured" aria-labelledby="featured-title">
            <div class="section-heading">
                <div>
                    <h2 id="featured-title">Mulai dari kebutuhanmu</h2>
                    <p>Jelajahi kategori pilihan dan temukan produk favorit.</p>
                </div>
                <a class="text-link" href="{{ route('products.index') }}">Lihat semua produk <i class="bi bi-arrow-right"></i></a>
            </div>
            <div class="feature-grid">
                <a class="feature-card" href="{{ route('products.index') }}">
                    <span class="feature-icon" aria-hidden="true">🍚</span>
                    <span><h3>Bahan pokok</h3><p>Persediaan penting untuk rumah setiap hari.</p></span>
                </a>
                <a class="feature-card" href="{{ route('products.index') }}">
                    <span class="feature-icon" aria-hidden="true">🥤</span>
                    <span><h3>Minuman</h3><p>Pilihan segar untuk menemani aktivitas.</p></span>
                </a>
                <a class="feature-card" href="{{ route('products.index') }}">
                    <span class="feature-icon" aria-hidden="true">🍪</span>
                    <span><h3>Camilan</h3><p>Temukan teman santai dan camilan favoritmu.</p></span>
                </a>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-inner">
            <span>© {{ now()->year }} MINIGIRL</span>
            <span>Belanja mudah · Cepat · Praktis</span>
        </div>
    </footer>
</body>

</html>
