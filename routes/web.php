<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/tentang', function () {
    $namaProdi = 'Teknologi Rekayasa Perangkat Lunak';
    $jurusan = 'Teknologi Informasi';

    return view('tentang', compact('namaProdi', 'jurusan'));
});

Route::get('/dosen', function () {
    $dosen = [
        [
            'nama' => 'Budi Santoso',
            'nidn' => '0012345678',
            'jabatan' => 'Dosen'
        ],
        [
            'nama' => 'Siti Aminah',
            'nidn' => '0012345679',
            'jabatan' => 'Dosen'
        ],
        [
            'nama' => 'Andi Wijaya',
            'nidn' => '0012345680',
            'jabatan' => 'Ketua Program Studi'
        ],
    ];

    return view('dosen', compact('dosen'));
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/dosen/{nama}', function ($nama) {
    return view('detail-dosen', compact('nama'));
});