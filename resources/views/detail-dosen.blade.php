@extends('layouts.app')

@section('title', 'Detail Dosen')

@section('content')

<style>
    .detail-wrapper {
        max-width: 750px;
        margin: 0 auto;
        animation: muncul 0.8s ease;
    }

    .detail-card {
        background: white;
        border-radius: 25px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 12px 35px rgba(15, 23, 42, 0.1);
        transition: 0.3s;
    }

    .detail-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 18px 40px rgba(15, 23, 42, 0.15);
    }

    .profile-icon {
        width: 120px;
        height: 120px;
        margin: 0 auto 25px;
        border-radius: 50%;
        background: linear-gradient(135deg, #172554, #2563eb);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 55px;
        color: white;
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
    }

    .detail-card h1 {
        color: #172554;
        font-size: 32px;
        margin-bottom: 10px;
        text-transform: capitalize;
    }

    .detail-card .status {
        display: inline-block;
        background: #eff6ff;
        color: #2563eb;
        padding: 8px 18px;
        border-radius: 30px;
        font-weight: bold;
        font-size: 14px;
        margin-bottom: 30px;
    }

    .detail-info {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
        margin-top: 25px;
    }

    .info-box {
        background: #f8fafc;
        padding: 20px;
        border-radius: 15px;
        transition: 0.3s;
    }

    .info-box:hover {
        background: #eff6ff;
        transform: translateY(-3px);
    }

    .info-box h3 {
        color: #2563eb;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .info-box p {
        color: #334155;
        font-weight: bold;
    }

    .back-btn {
        display: inline-block;
        margin-top: 30px;
        padding: 12px 25px;
        background: #2563eb;
        color: white;
        text-decoration: none;
        border-radius: 10px;
        font-weight: bold;
        transition: 0.3s;
    }

    .back-btn:hover {
        background: #172554;
        transform: translateY(-3px);
    }

    @media (max-width: 600px) {
        .detail-card {
            padding: 30px 20px;
        }

        .detail-info {
            grid-template-columns: 1fr;
        }

        .detail-card h1 {
            font-size: 26px;
        }
    }
</style>


<div class="detail-wrapper">

    <div class="detail-card">

        <div class="profile-icon">
            👨‍🏫
        </div>

        <h1>{{ $nama }}</h1>

        <div class="status">
            Dosen TRPL
        </div>

        <div class="detail-info">

            <div class="info-box">
                <h3>👨‍🏫 PROFESI</h3>
                <p>Dosen</p>
            </div>

            <div class="info-box">
                <h3>🎓 PROGRAM STUDI</h3>
                <p>TRPL</p>
            </div>

            <div class="info-box">
                <h3>🏢 JURUSAN</h3>
                <p>Teknologi Informasi</p>
            </div>

            <div class="info-box">
                <h3>📚 BIDANG</h3>
                <p>Teknologi Perangkat Lunak</p>
            </div>

        </div>

        <a href="/dosen" class="back-btn">
            ← Kembali ke Daftar Dosen
        </a>

    </div>

</div>

@endsection