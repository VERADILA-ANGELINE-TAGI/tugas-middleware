@extends('layouts.app')

@section('title', 'Dosen')

@section('content')

<style>
    .dosen-header {
        text-align: center;
        margin-bottom: 40px;
        animation: muncul 0.8s ease;
    }

    .dosen-header h1 {
        font-size: 38px;
        color: #172554;
        margin-bottom: 10px;
    }

    .dosen-header p {
        color: #64748b;
    }

    .dosen-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .dosen-card {
        background: white;
        border-radius: 20px;
        padding: 30px 25px;
        text-align: center;
        box-shadow: 0 8px 25px rgba(15, 23, 42, 0.08);
        transition: 0.35s;
        animation: naik 0.8s ease;
    }

    .dosen-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 18px 35px rgba(15, 23, 42, 0.15);
    }

    .dosen-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        border-radius: 50%;
        background: linear-gradient(135deg, #172554, #2563eb);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 35px;
    }

    .dosen-card h2 {
        color: #172554;
        font-size: 20px;
        margin-bottom: 12px;
    }

    .nidn {
        color: #64748b;
        font-size: 14px;
        margin-bottom: 10px;
    }

    .jabatan {
        display: inline-block;
        background: #eff6ff;
        color: #2563eb;
        padding: 7px 14px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: bold;
    }

    .detail-btn {
        display: inline-block;
        margin-top: 18px;
        padding: 9px 18px;
        background: #2563eb;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-size: 13px;
        transition: 0.3s;
    }

    .detail-btn:hover {
        background: #172554;
        transform: scale(1.05);
    }

    @media (max-width: 800px) {
        .dosen-grid {
            grid-template-columns: 1fr;
        }

        .dosen-header h1 {
            font-size: 30px;
        }
    }
</style>

<div class="dosen-header">

    <h1>👨‍🏫 Dosen TRPL</h1>

    <p>
        Mengenal tenaga pengajar Program Studi
        Teknologi Rekayasa Perangkat Lunak.
    </p>

</div>


<div class="dosen-grid">

    @foreach ($dosen as $index => $item)

        <div class="dosen-card">

            <div class="dosen-icon">
                👨‍🏫
            </div>

            <h2>{{ $item['nama'] }}</h2>

            <div class="nidn">
                NIDN: {{ $item['nidn'] }}
            </div>

            <div class="jabatan">
                {{ $item['jabatan'] }}
            </div>

            <br>

            <a
                href="/dosen/{{ strtolower(explode(' ', $item['nama'])[0]) }}"
                class="detail-btn"
            >
                Lihat Detail →
            </a>

        </div>

    @endforeach

</div>

@endsection