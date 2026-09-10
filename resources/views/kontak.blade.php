@extends('layouts.app')

@section('title', 'Kontak')

@section('content')

<style>
    .kontak-header {
        text-align: center;
        margin-bottom: 40px;
        animation: muncul 0.8s ease;
    }

    .kontak-header h1 {
        font-size: 38px;
        color: #172554;
        margin-bottom: 10px;
    }

    .kontak-header p {
        color: #64748b;
    }

    .kontak-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 25px;
    }

    .kontak-card {
        background: white;
        padding: 30px;
        border-radius: 20px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.08);
        transition: 0.35s;
        animation: naik 0.8s ease;
    }

    .kontak-card:hover {
        transform: translateY(-7px);
        box-shadow: 0 15px 30px rgba(15, 23, 42, 0.13);
    }

    .kontak-card h2 {
        color: #172554;
        margin-bottom: 20px;
    }

    .kontak-item {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 18px;
        padding: 15px;
        background: #f8fafc;
        border-radius: 12px;
        transition: 0.3s;
    }

    .kontak-item:hover {
        transform: translateX(7px);
        background: #eff6ff;
    }

    .kontak-icon {
        font-size: 25px;
    }

    .kontak-item strong {
        display: block;
        color: #172554;
        margin-bottom: 4px;
    }

    .kontak-item span {
        color: #64748b;
        font-size: 14px;
    }

    .pesan {
        line-height: 1.8;
        color: #475569;
    }

    @media (max-width: 700px) {
        .kontak-grid {
            grid-template-columns: 1fr;
        }

        .kontak-header h1 {
            font-size: 30px;
        }
    }
</style>

<div class="kontak-header">

    <h1>📞 Hubungi Kami</h1>

    <p>
        Informasi kontak Program Studi
        Teknologi Rekayasa Perangkat Lunak.
    </p>

</div>


<div class="kontak-grid">

    <!-- INFORMASI -->
    <div class="kontak-card">

        <h2>Informasi Program Studi</h2>

        <div class="kontak-item">
            <div class="kontak-icon">🎓</div>

            <div>
                <strong>Program Studi</strong>
                <span>Teknologi Rekayasa Perangkat Lunak</span>
            </div>
        </div>

        <div class="kontak-item">
            <div class="kontak-icon">🏢</div>

            <div>
                <strong>Jurusan</strong>
                <span>Teknologi Informasi</span>
            </div>
        </div>

        <div class="kontak-item">
            <div class="kontak-icon">📧</div>

            <div>
                <strong>Email</strong>
                <span>trpl@kampus.ac.id</span>
            </div>
        </div>

        <div class="kontak-item">
            <div class="kontak-icon">📱</div>

            <div>
                <strong>Telepon</strong>
                <span>+62 800 0000 0000</span>
            </div>
        </div>

    </div>


    <!-- PESAN -->
    <div class="kontak-card">

        <h2>👋 Selamat Datang</h2>

        <p class="pesan">
            Terima kasih telah mengunjungi website
            Program Studi Teknologi Rekayasa Perangkat Lunak.
        </p>

        <p class="pesan" style="margin-top: 15px;">
            Website ini dibuat sebagai mini project praktikum
            Laravel untuk memperkenalkan profil program studi,
            dosen, serta informasi kontak.
        </p>

        <a href="/" class="btn">
            ← Kembali ke Home
        </a>

    </div>

</div>

@endsection