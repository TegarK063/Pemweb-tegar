<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\c_admin;
use App\Http\Controllers\c_dosen;
use App\Http\Controllers\c_mahasiswa;
use App\Http\Controllers\c_barang;
use App\Http\Controllers\c_contact;
use App\Http\Controllers\c_home;
use App\Http\Controllers\c_nilai;
use App\Http\Controllers\c_rinciannilai;
use App\Http\Controllers\c_user;
use Illuminate\Support\Facades\Route;

Route::get('/registrasi', [AuthController::class, 'tampilregistrasi'])->name('registrasi.tampil');
Route::post('/registrasi/submit', [AuthController::class, 'submitregistrasi'])->name('registrasi.submit');

Route::get('/', [AuthController::class, 'tampillogin'])->name('login.tampil');
Route::post('/login/submit', [AuthController::class, 'submitlogin'])->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/mahasiswa/export/pdf', [App\Http\Controllers\c_mahasiswa::class, 'exportPdf'])->name('mahasiswa.export.pdf');
    // Route::get('/admin/cetakpdf', [c_mahasiswa::class, 'cetakpdf'])->name('admin.cetakpdf');
    Route::get('/admin/chart', [c_admin::class, 'tampilchart'])->name('admin.chart');
    // Route::get('/admin/nilai', [c_admin::class, 'tampilnilai'])->name('admin.nilai');
    Route::get('/admin/nilai', [c_nilai::class, 'tampilnilai'])->name('admin.nilai');
    Route::get('/admin/tambahnilai', [c_nilai::class, 'tambahnilai'])->name('admin.tambahnilai');
    Route::post('/admin/storenilai', [c_nilai::class, 'store'])->name('admin.storenilai');
    Route::get('/admin/detailnilai/{id_nilai}', [c_nilai::class, 'detailnilai'])->name('admin.detailnilai');
    Route::get('/admin/editnilai/{id_nilai}', [c_nilai::class, 'edit'])->name('admin.editnilai');
    Route::post('/admin/update/{id_nilai}', [c_nilai::class, 'update'])->name('admin.updatenilai');
    Route::get('/admin/hapusnilai/{id_nilai}', [c_nilai::class, 'hapus'])->name('admin.hapusnilai');

    Route::get('/admin/detailnilai', [c_rinciannilai::class, 'tampildetailnilai'])->name('admin.detailnilai');
    Route::get('/admin/tambahdetail', [c_rinciannilai::class, 'tambahdetailnilai'])->name('admin.tambahdetailnilai');
    Route::get('/get-nama-mahasiswa/{nim}', [c_rinciannilai::class, 'getNamaMahasiswa'])->name('get.nama.mahasiswa');
    Route::post('/admin/storedetail', [c_rinciannilai::class, 'store'])->name('admin.storedetail');
    Route::get('/admin/editdetailnilai/{id_detail_nilai}', [c_rinciannilai::class, 'edit'])->name('admin.editdetailnilai');
    Route::put('/admin/updatedetailnilai/{id_detail_nilai}', [c_rinciannilai::class, 'update'])->name('admin.updatedetailnilai');
    Route::get('/admin/hapusdetailnilai/{id_detail_nilai}', [c_rinciannilai::class, 'hapus'])->name('admin.hapusdetailnilai');

    Route::get('/admin/dashboard', [c_admin::class, 'tampildashboard'])->name('admin.dashboard');
    Route::get('/dosen', [c_dosen::class, 'dosens']);
    Route::get('/dosen/detail/{id_dosen}', [c_dosen::class, 'detail']);
    Route::get('/dosen/tambah', [c_dosen::class, 'tambah']);
    Route::post('/dosen/store', [c_dosen::class, 'store']);
    Route::get('/dosen/edit/{id_dosen}', [c_dosen::class, 'edit']);
    Route::post('/dosen/update/{id_dosen}', [c_dosen::class, 'update']);
    Route::get('/dosen/hapus/{id_dosen}', [c_dosen::class, 'hapus']);
    Route::get('/mahasiswa', [c_mahasiswa::class, 'mahasiswas']);
    Route::get('/mahasiswa/detail/{nim}', [c_mahasiswa::class, 'detail']);
    Route::get('/mahasiswa/tambah', [c_mahasiswa::class, 'tambah']);
    Route::post('/mahasiswa/store', [c_mahasiswa::class, 'store']);
    Route::get('/mahasiswa/edit/{nim}', [c_mahasiswa::class, 'edit']);
    Route::post('/mahasiswa/update/{nim}', [c_mahasiswa::class, 'update']);
    Route::get('/mahasiswa/hapus/{nim}', [c_mahasiswa::class, 'hapus']);
    Route::get('/getProdi/{id_jurusan}', [c_mahasiswa::class, 'getProdi']);
    Route::get('/getProdi/{id_jurusan}', [c_dosen::class, 'getProdi']);
});

// MAHASISWA
Route::middleware(['auth', 'role:mahasiswa'])->group(function () {
    Route::get('/mahasiswa/dashboard', [c_mahasiswa::class, 'tampildashboard'])->name('mahasiswa.dashboard');
    Route::get('/mahasiswa/halamanmahasiswa', [c_mahasiswa::class, 'tampilmahasiswa'])->name('mahasiswa.halamanmahasiswa');
});

// DOSEN
Route::middleware(['auth', 'role:dosen'])->group(function () {
    Route::get('/dosen/dashboard', [c_dosen::class, 'tampildashboard'])->name('dosen.dashboard');
    Route::get('/dosen/halamandosen', [c_dosen::class, 'tampildosens'])->name('dosen.halamandosen');
});
// USER
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.v_dashboard');
    })->name('user.dashboard');
    route::get('/user/halamanuser', [c_user::class, 'halamanuser'])->name('user.halamanuser');
});

// USER
// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('/user/dashboard', [c_user::class, 'tampildashboard'])->name('user.dashboard');
// });
// // mengecek request
// route::middleware('auth')->group(function () {
//     Route::get('/dosen', [c_dosen::class, 'dosens']);
//     Route::get('/dosen/detail/{id_dosen}', [c_dosen::class, 'detail']);
//     Route::get('/dosen/tambah', [c_dosen::class, 'tambah']);
//     Route::post('/dosen/store', [c_dosen::class, 'store']);
//     Route::get('/dosen/edit/{id_dosen}', [c_dosen::class, 'edit']);
//     Route::post('/dosen/update/{id_dosen}', [c_dosen::class, 'update']);
//     Route::get('/dosen/hapus/{id_dosen}', [c_dosen::class, 'hapus']);
//     Route::get('/mahasiswa', [c_mahasiswa::class, 'mahasiswas']);
//     Route::get('/mahasiswa/detail/{nim}', [c_mahasiswa::class, 'detail']);
//     Route::get('/mahasiswa/tambah', [c_mahasiswa::class, 'tambah']);
//     Route::post('/mahasiswa/store', [c_mahasiswa::class, 'store']);
//     Route::get('/mahasiswa/edit/{nim}', [c_mahasiswa::class, 'edit']);
//     Route::post('/mahasiswa/update/{nim}', [c_mahasiswa::class, 'update']);
//     Route::get('/mahasiswa/hapus/{nim}', [c_mahasiswa::class, 'hapus']);
// });
Route::view('/about', 'v_about',);
Route::get('/contact', [c_contact::class, 'contacts']);
Route::get('/barang', [c_barang::class, 'barangs']);
Route::get('/home', [c_home::class, 'homes']);
Route::get('/home/about/{id}', [c_home::class, 'abouts']);




// Route::view ('/contact', 'v_contact', [
//     'name' => 'Tegar Kusuma',
//     'email' => 'tegar.kusuma@gmail.com',
// ]);

// Route::get ('/contact', function() {
//     return view('v_contact', [ 'name' => 'Tegar Kusuma',
//     'email' => 'tegar.kusuma@gmail.com',]);
// });

// Route::get('/about', function () {
//     return 'Halaman About';
// });
// Route::get('/kali', function () {
//     return 9 * 9;
// });

// // route::view('/admin', 'admin/v_admin');

// route::view('/admin', 'admin.v_admin');

// // Route::get('/mahasiswa/', function ($nama_mahasiswa = 'Tegar Kusuma') {
// //     return view ('mahasiswa', ['nama_mahasiswa' => $nama_mahasiswa]);
// // });

// // route::view('/about', 'about',
// // ['name' => 'Tegar Kusuma',
// // 'alamat' => 'Subang']);