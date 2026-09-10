@extends('layouts.app')

@section('title', 'Home')

@section('content')

<style>
    .hero {
        min-height: 500px;
        border-radius: 25px;
        padding: 60px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;

        background: linear-gradient(135deg, #172554, #2563eb);
        color: white;

        overflow: hidden;
        position: relative;

        animation: muncul 0.8s ease;
    }

    .hero::before {
        content: "";
        position: absolute;
        width: 250px;
        height: 250px;
        border-radius: 50%;
        background: rgba(255,255,255,0.08);
        top: -80px;
        right: -50px;
        animation: mengambang 4s ease-in-out infinite;
    }

    .hero::after {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        border-radius: 50%;
        background: rgba(255,255,255,0.06);
        bottom: -70px;
        left: -50px;
        animation: mengambang 5s ease-in-out infinite;
    }

    .hero-text {
        max-width: 600px;
        position: relative;
        z-index: 2;
        animation: masukKiri 1s ease;
    }

    .hero-text .badge {
        display: inline-block;
        background: rgba(255,255,255,0.15);
        padding: 8px 15px;
        border-radius: 30px;
        font-size: 14px;
        margin-bottom: 20px;
    }

    .hero-text h1 {
        font-size: 45px;
        line-height: 1.2;
        margin-bottom: 20px;
    }

    .hero-text h1 span {
        color: #93c5fd;
    }

    .hero-text p {
        line-height: 1.8;
        font-size: 16px;
        opacity: 0.9;
    }

    .hero-buttons {
        margin-top: 30px;
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }

    .btn-primary {
        background: white;
        color: #1d4ed8;
        padding: 13px 23px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-primary:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }

    .btn-secondary {
        border: 1px solid rgba(255,255,255,0.5);
        color: white;
        padding: 13px 23px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: bold;
        transition: 0.3s;
    }

    .btn-secondary:hover {
        background: rgba(255,255,255,0.12);
        transform: translateY(-4px);
    }

    .hero-icon {
        width: 230px;
        height: 230px;
        border-radius: 50%;
        background: rgba(255,255,255,0.12);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 100px;
        position: relative;
        z-index: 2;
        animation: mengambang 3s ease-in-out infinite;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    /* INFORMASI */
    .section-title {
        text-align: center;
        margin: 55px 0 30px;
    }

    .section-title h2 {
        color: #172554;
        font-size: 30px;
        margin-bottom: 10px;
    }

    .section-title p {
        color: #64748b;
    }

    .feature-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .feature-card {
        background: white;
        padding: 30px;
        border-radius: 18px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(15,23,42,0.08);
        transition: 0.35s;
        animation: naik 0.8s ease;
    }

    .feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(15,23,42,0.15);
    }

    .feature-icon {
        font-size: 40px;
        margin-bottom: 15px;
    }

    .feature-card h3 {
        color: #172554;
        margin-bottom: 10px;
    }

    .feature-card p {
        color: #64748b;
        line-height: 1.6;
        font-size: 14px;
    }

    /* ANIMASI */
    @keyframes masukKiri {
        from {
            opacity: 0;
            transform: translateX(-40px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes mengambang {
        0%, 100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-12px);
        }
    }

    @media (max-width: 800px) {

        .hero {
            padding: 40px 25px;
            flex-direction: column;
            text-align: center;
        }

        .hero-text h1 {
            font-size: 32px;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-icon {
            width: 160px;
            height: 160px;
            font-size: 70px;
        }

        .feature-grid {
            grid-template-columns: 1fr;
        }
    }
</style>


<!-- HERO -->
<section class="hero">

    <div class="hero-text">

        <div class="badge">
            🎓 Program Studi
        </div>

        <h1>
            Teknologi Rekayasa
            <span>Perangkat Lunak</span>
        </h1>

        <p>
            Selamat datang di website Program Studi
            Teknologi Rekayasa Perangkat Lunak.
            Kenali program studi, dosen, serta informasi
            yang tersedia di dalamnya.
        </p>

        <div class="hero-buttons">

            <a href="/tentang" class="btn-primary">
                Jelajahi Prodi →
            </a>

            <a href="/dosen" class="btn-secondary">
                Lihat Dosen
            </a>

        </div>

    </div>


    <div class="hero-icon">
        💻
    </div>

</section>


<!-- KEUNGGULAN -->
<div class="section-title">

    <h2>Jelajahi Website</h2>

    <p>
        Temukan informasi mengenai Program Studi TRPL
    </p>

</div>


<div class="feature-grid">

    <div class="feature-card">

        <div class="feature-icon">
            🎯
        </div>

        <h3>Tentang Prodi</h3>

        <p>
            Mengenal profil, visi, misi, dan informasi
            Program Studi Teknologi Rekayasa Perangkat Lunak.
        </p>

    </div>


    <div class="feature-card">

        <div class="feature-icon">
            👨‍🏫
        </div>

        <h3>Dosen</h3>

        <p>
            Lihat daftar dosen dan informasi detail
            tenaga pengajar Program Studi TRPL.
        </p>

    </div>


    <div class="feature-card">

        <div class="feature-icon">
            📞
        </div>

        <h3>Kontak</h3>

        <p>
            Temukan informasi kontak dan informasi
            mengenai Program Studi TRPL.
        </p>

    </div>

</div>

@endsection