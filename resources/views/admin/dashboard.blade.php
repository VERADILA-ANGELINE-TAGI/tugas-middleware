<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiniMarket Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --bg-1: #030b17;
            --bg-2: #0b162b;
            --bg-3: #111d35;
            --panel: rgba(12, 19, 31, 0.72);
            --panel-strong: rgba(18, 28, 44, 0.9);
            --line: rgba(255, 255, 255, 0.09);
            --cyan: #69e3ff;
            --blue: #5fa3ff;
            --purple: #8b6dff;
            --pink: #ff78d4;
            --green: #67f0b0;
            --amber: #ffd166;
            --red: #ff6f7d;
            --text: #edf6ff;
            --muted: #9bb2d0;
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            min-height: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at 8% 12%, rgba(139, 109, 255, 0.24), transparent 18%),
                radial-gradient(circle at 82% 14%, rgba(105, 227, 255, 0.18), transparent 20%),
                radial-gradient(circle at 68% 78%, rgba(255, 120, 212, 0.18), transparent 22%),
                linear-gradient(135deg, var(--bg-1), var(--bg-2) 35%, var(--bg-3));
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,255,255,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.04) 1px, transparent 1px);
            background-size: 34px 34px;
            mask-image: radial-gradient(circle at center, black 40%, transparent 90%);
            pointer-events: none;
        }

        .dashboard-shell {
            position: relative;
            min-height: 100vh;
            padding: 28px 18px 44px;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            filter: blur(32px);
            opacity: 0.82;
            animation: float 12s ease-in-out infinite;
        }

        .orb.one {
            width: 280px; height: 280px;
            left: 7%; top: 6%;
            background: rgba(139, 109, 255, 0.22);
        }

        .orb.two {
            width: 340px; height: 340px;
            right: 9%; top: 16%;
            background: rgba(105, 227, 255, 0.18);
            animation-delay: 2.5s;
        }

        .orb.three {
            width: 220px; height: 220px;
            left: 38%; bottom: 6%;
            background: rgba(255, 120, 212, 0.16);
            animation-delay: 4.2s;
        }

        @keyframes float {
            0%, 100% { transform: translate3d(0,0,0) scale(1); }
            50% { transform: translate3d(0,-18px,0) scale(1.08); }
        }

        .glass {
            background: rgba(11, 18, 30, 0.66);
            border: 1px solid var(--line);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border-radius: 26px;
            box-shadow: 0 30px 60px rgba(2, 6, 15, 0.5);
        }

        .topbar {
            position: relative; z-index: 2;
            max-width: 1280px;
            margin: 0 auto 28px;
            padding: 18px 22px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 800;
            letter-spacing: 0.04em;
        }

        .brand-mark {
            width: 46px; height: 46px;
            border-radius: 16px;
            display: grid; place-items: center;
            background: linear-gradient(135deg, var(--cyan), var(--purple));
            color: #091521;
            font-weight: 900;
            box-shadow: 0 15px 30px rgba(105, 227, 255, 0.36);
        }

        .brand small {
            display: block;
            font-size: 0.7rem;
            letter-spacing: 0.16em;
            color: var(--muted);
            text-transform: uppercase;
        }

        .top-actions {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .live-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border-radius: 999px;
            padding: 8px 12px;
            background: rgba(103, 240, 176, 0.12);
            border: 1px solid rgba(103, 240, 176, 0.18);
            color: #dffef2;
            font-size: 0.78rem;
            font-weight: 700;
        }

        .live-dot {
            width: 9px; height: 9px;
            border-radius: 50%;
            background: var(--green);
            box-shadow: 0 0 0 0 rgba(103, 240, 176, 0.7);
            animation: pulse 1.8s infinite;
        }

        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(103,240,176,0.6); }
            70% { box-shadow: 0 0 0 12px rgba(103,240,176,0); }
            100% { box-shadow: 0 0 0 0 rgba(103,240,176,0); }
        }

        .logout-btn {
            border: 1px solid rgba(255,255,255,0.08);
            background: linear-gradient(135deg, rgba(255,255,255,0.08), rgba(255,255,255,0.02));
            color: var(--text);
            border-radius: 14px;
            padding: 11px 18px;
            font-weight: 700;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 30px rgba(8, 12, 20, 0.28);
        }

        .content {
            position: relative; z-index: 2;
            max-width: 1280px;
            margin: 0 auto;
        }

        .main-grid {
            display: grid;
            grid-template-columns: 1.5fr 0.9fr;
            gap: 26px;
            align-items: stretch;
        }

        .hero {
            position: relative;
            padding: 26px 28px;
            overflow: hidden;
            min-height: 240px;
        }

        .hero::before {
            content: "";
            position: absolute;
            inset: -40% -12% auto auto;
            width: 260px; height: 260px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(105, 227, 255, 0.2), transparent 65%);
            filter: blur(12px);
        }

        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(120deg, transparent 15%, rgba(255,255,255,0.08) 45%, transparent 70%);
            transform: translateX(-120%);
            animation: shine 5.5s ease-in-out infinite;
        }

        @keyframes shine {
            0% { transform: translateX(-120%); }
            40%, 100% { transform: translateX(120%); }
        }

        .eyebrow {
            margin: 0;
            color: var(--cyan);
            font-size: 0.7rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            font-weight: 800;
        }

        .hero h1 {
            position: relative;
            z-index: 1;
            margin: 8px 0 12px;
            font-size: clamp(2.4rem, 5vw, 4.5rem);
            font-weight: 900;
            letter-spacing: -0.07em;
            line-height: 0.92;
        }

        .hero p {
            position: relative; z-index: 1;
            margin: 0;
            max-width: 620px;
            color: var(--muted);
            font-size: 1.02rem;
        }

        .hero-actions {
            position: relative; z-index: 1;
            margin-top: 22px;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .primary-btn, .ghost-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 18px;
            border-radius: 16px;
            text-decoration: none;
            font-weight: 800;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .primary-btn {
            background: linear-gradient(135deg, var(--cyan), var(--purple));
            color: #081722;
            box-shadow: 0 18px 35px rgba(105, 227, 255, 0.24);
        }

        .ghost-btn {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            color: var(--text);
        }

        .primary-btn:hover, .ghost-btn:hover {
            transform: translateY(-2px);
            text-decoration: none;
        }

        .kpi-panel {
            padding: 22px;
        }

        .ring-box {
            display: grid;
            place-items: center;
            min-height: 240px;
            position: relative;
        }

        .ring {
            width: 170px; height: 170px;
            border-radius: 50%;
            background: conic-gradient(var(--cyan) 0 68%, rgba(255,255,255,0.08) 68% 100%);
            display: grid; place-items: center;
            position: relative;
            box-shadow: inset 0 0 20px rgba(105, 227, 255, 0.18), 0 18px 30px rgba(105, 227, 255, 0.12);
            animation: spin 14s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .ring::before {
            content: "";
            position: absolute;
            inset: 18px;
            border-radius: 50%;
            background: rgba(11, 18, 30, 0.9);
            border: 1px solid rgba(255,255,255,0.06);
        }

        .ring-score {
            position: absolute;
            text-align: center;
            z-index: 1;
        }

        .ring-score strong {
            display: block;
            font-size: 2.1rem;
            font-weight: 900;
            letter-spacing: -0.05em;
        }

        .ring-score span {
            color: var(--muted);
            font-size: 0.8rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .mini-metrics {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 18px;
        }

        .mini-card {
            padding: 14px 12px;
            border-radius: 18px;
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.06);
        }

        .mini-card small {
            display: block;
            margin-bottom: 6px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: 0.08em;
            font-size: 0.72rem;
        }

        .mini-card strong {
            font-size: 1.3rem;
            font-weight: 800;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 22px;
            margin-top: 26px;
        }

        .stat-card {
            position: relative;
            padding: 20px 20px 18px;
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .stat-card::before {
            content: "";
            position: absolute;
            inset: -30% auto auto 62%;
            width: 120px; height: 120px;
            border-radius: 50%;
            background: rgba(255,255,255,0.06);
            filter: blur(10px);
        }

        .stat-card:hover {
            transform: perspective(1200px) rotateX(8deg) rotateY(-8deg) translateY(-8px);
            box-shadow: 0 28px 44px rgba(8,12,20,0.48);
        }

        .stat-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
        }

        .stat-label {
            margin: 0 0 10px;
            color: var(--muted);
            font-size: 0.72rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
        }

        .stat-number {
            margin: 0;
            font-size: clamp(1.9rem, 3vw, 2.9rem);
            letter-spacing: -0.06em;
            font-weight: 900;
        }

        .icon-wrap {
            width: 54px; height: 54px;
            border-radius: 18px;
            display: grid; place-items: center;
            border: 1px solid rgba(255,255,255,0.08);
            background: rgba(255,255,255,0.04);
            font-size: 1.3rem;
        }

        .trend {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        .trend.up { color: var(--green); }
        .trend.down { color: var(--red); }

        .panel-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 24px;
            margin-top: 28px;
        }

        .panel {
            position: relative;
            padding: 22px 22px 18px;
            overflow: hidden;
        }

        .panel-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .panel-header h3 {
            margin: 0;
            font-size: 1.2rem;
            font-weight: 800;
        }

        .tag {
            display: inline-flex;
            padding: 7px 10px;
            border-radius: 999px;
            background: rgba(105, 227, 255, 0.11);
            border: 1px solid rgba(105, 227, 255, 0.14);
            color: var(--cyan);
            font-size: 0.74rem;
            font-weight: 700;
        }

        .bars {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 12px;
            height: 190px;
            padding-top: 10px;
        }

        .bar-wrap {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: end;
            gap: 10px;
            height: 100%;
        }

        .bar {
            width: 100%;
            max-width: 44px;
            border-radius: 16px 16px 0 0;
            background: linear-gradient(180deg, var(--cyan), var(--purple));
            box-shadow: 0 18px 28px rgba(105, 227, 255, 0.18);
            transform-origin: bottom;
            animation: rise 1s ease forwards;
        }

        .bar:nth-child(2n) { background: linear-gradient(180deg, #8cc9ff, #8b6dff); }

        @keyframes rise {
            from { transform: scaleY(0.15); opacity: 0.2; }
            to { transform: scaleY(1); opacity: 1; }
        }

        .bar-label {
            color: var(--muted);
            font-size: 0.74rem;
        }

        .activity-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .activity-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 14px 14px;
            border-radius: 18px;
            background: rgba(255,255,255,0.02);
            border: 1px solid rgba(255,255,255,0.06);
        }

        .activity-item strong {
            display: block;
            margin-bottom: 4px;
        }

        .activity-item small {
            color: var(--muted);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 52px;
            padding: 7px 10px;
            border-radius: 999px;
            font-weight: 800;
            font-size: 0.72rem;
        }

        .green { background: rgba(103,240,176,0.12); color: var(--green); }
        .purple { background: rgba(139, 109, 255, 0.12); color: #d9d1ff; }
        .pink { background: rgba(255, 120, 212, 0.12); color: #ffd5f5; }

        @media (max-width: 991px) {
            .main-grid, .panel-grid { grid-template-columns: 1fr; }
            .stats-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 576px) {
            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 12px;
            }
            .top-actions { width: 100%; justify-content: space-between; }
            .hero-actions { flex-direction: column; align-items: stretch; }
            .primary-btn, .ghost-btn { width: 100%; }
        }
    </style>
</head>

<body>
    <div class="dashboard-shell">
        <div class="orb one"></div>
        <div class="orb two"></div>
        <div class="orb three"></div>

        <nav class="topbar glass">
            <div class="brand">
                <div class="brand-mark">M</div>
                <div>
                    <div>MiniMarket</div>
                    <small>Control Center</small>
                </div>
            </div>

            <div class="top-actions">
                <span class="live-pill"><span class="live-dot"></span> Live</span>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </nav>

        <main class="content">
            <div class="main-grid">
                <header class="hero glass">
                    <div>
                        <p class="eyebrow">Overview</p>
                        <h1>Dashboard<br>Admin</h1>
                        <p>Monitoring produk, stok, dan performa penjualan dari satu panel yang lebih modern, responsif, dan visual.</p>

                        <div class="hero-actions">
                            <a href="/products" class="primary-btn"><i class="bi bi-box-seam"></i> Kelola Produk</a>
                            <a href="#" class="ghost-btn"><i class="bi bi-download"></i> Export</a>
                        </div>
                    </div>
                </header>

                <aside class="kpi-panel glass">
                    <div class="ring-box">
                        <div class="ring"></div>
                        <div class="ring-score">
                            <strong>68%</strong>
                            <span>Target</span>
                        </div>
                    </div>

                    <div class="mini-metrics">
                        <div class="mini-card">
                            <small>Revenue</small>
                            <strong>Rp 24.5K</strong>
                        </div>
                        <div class="mini-card">
                            <small>Users</small>
                            <strong>1.2K</strong>
                        </div>
                    </div>
                </aside>
            </div>

            <section class="stats-grid">
                <article class="stat-card glass">
                    <div class="stat-top">
                        <div>
                            <p class="stat-label">Total Produk</p>
                            <h2 class="stat-number">{{ $totalProduk }}</h2>
                        </div>
                        <div class="icon-wrap" style="background: linear-gradient(135deg, rgba(105,227,255,.12), rgba(139,109,255,.14));">
                            <i class="bi bi-box2"></i>
                        </div>
                    </div>
                    <div class="trend up"><i class="bi bi-arrow-up-right"></i> +12% bulan ini</div>
                </article>

                <article class="stat-card glass">
                    <div class="stat-top">
                        <div>
                            <p class="stat-label">Total Stok</p>
                            <h2 class="stat-number">{{ $totalStok }}</h2>
                        </div>
                        <div class="icon-wrap" style="background: linear-gradient(135deg, rgba(103,240,176,.12), rgba(105,227,255,.14));">
                            <i class="bi bi-stack"></i>
                        </div>
                    </div>
                    <div class="trend up"><i class="bi bi-arrow-up-right"></i> +8% minggu ini</div>
                </article>

                <article class="stat-card glass">
                    <div class="stat-top">
                        <div>
                            <p class="stat-label">Penjualan</p>
                            <h2 class="stat-number">1.248</h2>
                        </div>
                        <div class="icon-wrap" style="background: linear-gradient(135deg, rgba(255,120,212,.12), rgba(139,109,255,.14));">
                            <i class="bi bi-graph-up-arrow"></i>
                        </div>
                    </div>
                    <div class="trend down"><i class="bi bi-arrow-down-right"></i> -2% dibanding kemarin</div>
                </article>
            </section>

            <section class="panel-grid">
                <div class="panel glass">
                    <div class="panel-header">
                        <h3>Performa Bulanan</h3>
                        <span class="tag">2026</span>
                    </div>

                    <div class="bars">
                        <div class="bar-wrap"><div class="bar" style="height: 42%;"></div><span class="bar-label">Jan</span></div>
                        <div class="bar-wrap"><div class="bar" style="height: 54%;"></div><span class="bar-label">Feb</span></div>
                        <div class="bar-wrap"><div class="bar" style="height: 66%;"></div><span class="bar-label">Mar</span></div>
                        <div class="bar-wrap"><div class="bar" style="height: 74%;"></div><span class="bar-label">Apr</span></div>
                        <div class="bar-wrap"><div class="bar" style="height: 86%;"></div><span class="bar-label">Mei</span></div>
                        <div class="bar-wrap"><div class="bar" style="height: 96%;"></div><span class="bar-label">Jun</span></div>
                    </div>
                </div>

                <aside class="panel glass">
                    <div class="panel-header">
                        <h3>Aktivitas</h3>
                        <span class="tag">Hari ini</span>
                    </div>

                    <div class="activity-list">
                        <div class="activity-item">
                            <div>
                                <strong>Produk baru</strong>
                                <small>5 item ditambahkan</small>
                            </div>
                            <span class="badge green">+5</span>
                        </div>
                        <div class="activity-item">
                            <div>
                                <strong>Pembelian</strong>
                                <small>48 transaksi</small>
                            </div>
                            <span class="badge purple">48</span>
                        </div>
                        <div class="activity-item">
                            <div>
                                <strong>Stok rendah</strong>
                                <small>3 SKU butuh restock</small>
                            </div>
                            <span class="badge pink">3</span>
                        </div>
                    </div>
                </aside>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.stat-card, .panel, .hero, .kpi-panel').forEach((card) => {
            card.addEventListener('pointermove', (event) => {
                const rect = card.getBoundingClientRect();
                const x = (event.clientX - rect.left) / rect.width;
                const y = (event.clientY - rect.top) / rect.height;
                const rotateY = (x - 0.5) * 18;
                const rotateX = (0.5 - y) * 18;
                card.style.transform = `perspective(1200px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-8px)`;
            });

            card.addEventListener('pointerleave', () => {
                card.style.transform = 'perspective(1200px) rotateX(0deg) rotateY(0deg) translateY(0)';
            });
        });
    </script>
</body>

</html>
