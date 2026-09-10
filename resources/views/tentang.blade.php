@extends('layouts.app')

@section('title', 'Tentang')

@section('content')

<style>
    .hero-tentang {
        background: linear-gradient(135deg, #172554, #2563eb);
        color: white;
        padding: 50px 40px;
        border-radius: 20px;
        text-align: center;
        animation: muncul 0.8s ease;
    }

    .hero-tentang h1 {
        font-size: 38px;
        margin-bottom: 15px;
    }

    .hero-tentang p {
        line-height: 1.7;
        opacity: 0.9;
    }

    .section-title {
        text-align: center;
        margin: 45px 0 25px;
        font-size: 28px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
    }

    .info-card {
        background: white;
        padding: 30px;
        border-radius: 18px;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.08);
        transition: 0.3s;
        animation: naik 0.8s ease;
    }

    .info-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(15, 23, 42, 0.15);
    }

    .info-card h2 {
        color: #1d4ed8;
        margin-bottom: 15px;
    }

    .info-card p,
    .info-card li {
        line-height: 1.7;
    }

    .info-card ul {
        padding-left: 20px;
    }

    .akreditasi {
        margin-top: 25px;
        text-align: center;
        background: #eff6ff;
        padding: 20px;
        border-radius: 15px;
        border-left: 5px solid #2563eb;
    }

    @media (max-width: 700px) {
        .hero-tentang {
            padding: 35px 20px;
        }

        .hero-tentang h1 {
            font-size: 28px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<!-- HERO -->
<div class="hero-tentang">

    <h1>Tentang Program Studi</h1>

    <p>
        {{ $namaProdi }}
    </p>

    <p>
        Jurusan {{ $jurusan }}
    </p>

</div>


<!-- PROFIL -->
<h2 class="section-title">Profil Program Studi</h2>

<div class="info-card">

    <p>
        Program Studi <strong>{{ $namaProdi }}</strong>
        merupakan program studi di bidang teknologi informasi
        yang berfokus pada pengembangan perangkat lunak.
    </p>

    <p style="margin-top: 15px;">
        Mahasiswa mempelajari berbagai pengetahuan dan keterampilan
        yang berkaitan dengan perancangan, pengembangan, dan
        pemanfaatan perangkat lunak.
    </p>

</div>


<!-- VISI MISI -->
<h2 class="section-title">Visi & Misi</h2>

<div class="info-grid">

    <div class="info-card">

        <h2>🎯 Visi</h2>

        <p>
            Menjadi program studi yang unggul dalam menghasilkan
            lulusan yang kompeten, kreatif, inovatif, dan mampu
            mengikuti perkembangan teknologi perangkat lunak.
        </p>

    </div>


    <div class="info-card">

        <h2>🚀 Misi</h2>

        <ul>
            <li>
                Menyelenggarakan pendidikan yang berkualitas
                di bidang rekayasa perangkat lunak.
            </li>

            <li>
                Mengembangkan kemampuan mahasiswa dalam
                teknologi dan pengembangan perangkat lunak.
            </li>

            <li>
                Mendorong kreativitas dan inovasi mahasiswa
                melalui pembelajaran dan proyek.
            </li>

            <li>
                Mempersiapkan lulusan yang mampu menghadapi
                perkembangan teknologi.
            </li>
        </ul>

    </div>

</div>


<!-- AKREDITASI -->
<h2 class="section-title">Akreditasi</h2>

@php
    $akreditasi = 'Baik Sekali';
@endphp

<div class="akreditasi">

    @if ($akreditasi == 'Unggul')

        <p>
            🏆 Program Studi Terakreditasi <strong>Unggul</strong>
        </p>

    @elseif ($akreditasi == 'Baik Sekali')

        <p>
            ⭐ Program Studi Terakreditasi <strong>Baik Sekali</strong>
        </p>

    @else

        <p>
            Informasi akreditasi belum tersedia.
        </p>

    @endif

</div>

@endsection