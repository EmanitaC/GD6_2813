<?php

use Illuminate\Support\Facades\Route;

$daftarkonser = [
    1 => ['nama' => 'Coldplay Music of the Spheres', 'kota' => 'Jakarta', 'harga' => 1500000, 'sisa' => 25, 'tanggal' => '2027-03-15'],
    2 => ['nama' => 'NCT Dream The Dream Show', 'kota' => 'Jakarta', 'harga' => 1200000, 'sisa' => 0, 'tanggal' => '2027-03-20'],
    3 => ['nama' => 'Dewa 19 Pesta Rakyat', 'kota' => 'Yogyakarta', 'harga' => 450000, 'sisa' => 120, 'tanggal' => '2027-04-10'],
    4 => ['nama' => 'Sheila on 7 Tunggu Aku di', 'kota' => 'Yogyakarta', 'harga' => 350000, 'sisa' => 5, 'tanggal' => '2027-04-25'],
    5 => ['nama' => 'Tulus Tur Manusia', 'kota' => 'Bandung', 'harga' => 500000, 'sisa' => 50, 'tanggal' => '2027-05-05'],
];

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/konser', function () use ($daftarkonser) {
    return view('konser', compact('daftarkonser'));
})->name('konser.index');

Route::get('/konser/kota/{kota}', function ($kota) use ($daftarkonser) {
    $hasil = collect($daftarkonser)->where('kota', ucfirst($kota));
    $judul = 'Konser di ' . ucfirst($kota);
    return view('konser', [
        'daftarkonser' => $hasil,
        'judul' => $judul
    ]);
})->whereAlpha('kota')->name('konser.kota');

Route::get('/konser/{id}', function ($id) use ($daftarkonser) {
    abort_unless(isset($daftarkonser[$id]), 404);
    return view('konser-detail', [
        'id' => $id,
        'konser' => $daftarkonser[$id],
    ]);
})->whereNumber('id')->name('konser.detail');

Route::view('/tentang', 'about')->name('tentang');

Route::view('/kontak', 'kontak')->name('kontak');