<?php

use App\Http\Controllers\PeminjamanDetailController;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RakController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RoutesController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\KategoriController;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\Admin\KategoriBukuController;
use App\Http\Controllers\PenerbitController; // Namespace lengkap dari controller

Route::middleware(RoleMiddleware::class)->group(function () {
    Route::get('/dashboard', [PagesController::class, 'dashboard'])->name('dashboard');

    Route::get('/daftar-buku-siswa', [PageController::class, 'bukuSiswa'])->name('bukuSiswa.index');

    Route::get('/peminjaman-siswa', [PageController::class, 'peminjamanSiswa'])->name('peminjaman.siswa');

    Route::get('/daftar-pengaturan-siswa', [PageController::class, 'pengaturanSiswa'])->name('pengaturan');

    Route::get('/', function () {
        return view('web_challenge_rahma');
    });

    Route::middleware(CheckAdminMiddleware::class)->group(function () {
        Route::patch('user/{id}/update_profile', [UsersController::class, 'upload_profile'])->name('action.upload_profile');
        Route::get('/belajar', function () {
            return 'Hallo, aku sedang belajar membuat website dengan Laravel';
        });
        Route::match(['get', 'post'], '/anggota', function () {
            return 'Hallo, aku membuat route anggota dengan beberapa method';
        });
        Route::get('/Request', [RequestController::class, 'store']);
        Route::get('/nama', function () {
            $nama = session('nama');
            return 'Halaman nama dengan rahmun ' . $nama;
        });
        Route::get('/array', function () {
            return [1, 'Perpustakaan', true];
        });
        Route::get('/hello', function () {
            return response($content = 'Hallo Laravel')
                ->withHeaders([
                    'Content-Type' => 'text/html',
                    'X-Header-One' => 'Header Value 1',
                    'X-Header-Two' => 'Header Value 2',
                ]);
        });
        Route::get('/', [RoutesController::class, 'Dashboard']);
        Route::get('/tes', function () {
            return redirect()->action([RoutesController::class, 'Dashboard']);
        });
        Route::post('/store', 'RequestController@store');
        Route::get('/perpustakaan/{buku}', 'RequestController@perpustakaan');


        Route::get('/bootstrap', function () {
            return view('bootstrap');
        });



        Route::prefix('/admin')->group(function () {
            Route::resource('/kategori-buku', KategoriBukuController::class);
        });

        Route::get('/', function () {
            return view('welcome');
        });

        // Dasboard siswa

        // Dashboard admin
        Route::get('/admin', [PagesController::class, 'dashboardAdmin'])->name('dashboardAdmin');

        Route::get('/daftar-buku-admin', [PageController::class, 'buku'])->name('buku.index');

        Route::get('/daftar-kategori-admin', [PageController::class, 'kategori'])->name('kategori.index');

        Route::get('/daftar-penulis-admin', [PageController::class, 'penulis'])->name('penulis.index');

        Route::get('/daftar-penerbit-admin', [PageController::class, 'penerbit'])->name('penerbit.index');

        Route::get('/daftar-rak-admin', [PageController::class, 'rak'])->name('rak.index');


        Route::get('/daftar-peminjaman-admin', [PageController::class, 'peminjaman'])->name('peminjaman.index');

        Route::get('/daftar-pengaturan-admin', [PageController::class, 'pengaturan'])->name('pengaturan');




        Route::get('/tambah-buku', [PageController::class, 'tambahBuku'])->name('tambah_buku');

        Route::get('/edit-buku', [PageController::class, 'editBuku']);

        Route::get('/tambah-kategori', [PageController::class, 'tambahKategori'])->name('tambah_kategori');

        Route::get('/edit-kategori', [PageController::class, 'editKategori']);

        Route::get('/tambah-penulis', [PageController::class, 'tambahPenulis'])->name('tambah_penulis');

        Route::get('/tambah-rak', [PageController::class, 'tambahRak'])->name('tambah_rak');

        Route::get('/edit-rak', [PageController::class, 'editRak']);



        Route::get('/edit-penulis', [PageController::class, 'editPenulis']);

        Route::get('/tambah-penerbit', [PageController::class, 'tambahPenerbit'])->name('tambah_penerbit');

        Route::get('/edit-penerbit', [PageController::class, 'editPenerbit']);

        Route::get('/tambah-peminjaman', [PageController::class, 'tambahPeminjaman']);

        Route::get('/edit-peminjaman', [PageController::class, 'editPeminjaman']);

        // Route::get('/peminjaman', [PageController::class, 'peminjaman'])->name('peminjaman.siswa');



        //penerbit
        Route::post('/createpenerbit', [PenerbitController::class, 'createPenerbit'])->name('action.createpenerbit');
        Route::get('/createpenerbit', [PageController::class, 'tambahPenerbit'])->name('create_penerbit');
        Route::get('/admin_update_penerbit/{id}', [PagesController::class, 'admin_update_penerbit'])->name('update_penerbit');
        Route::patch('/penerbit/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');
        Route::delete('/penerbit/{penerbit_id}', [PenerbitController::class, 'delete'])->name('penerbit.delete');

        //penulis
        Route::post('/createpenulis', [PenulisController::class, 'createPenulis'])->name('action.createpenulis');
        Route::get('/createpenulis', [PageController::class, 'tambahPenulis'])->name('create_penulis');
        Route::get('/admin_update_penulis/{id}', [PagesController::class, 'admin_update_penulis'])->name('update_penulis');
        Route::patch('/penulis/{id}', [PenulisController::class, 'update'])->name('penulis.update');
        Route::delete('/penulis/{penulis_id}', [PenulisController::class, 'delete'])->name('penulis.delete');

        //kategori

        Route::post('/createkategori', [KategoriController::class, 'createKategori'])->name('action.createkategori');
        Route::get('/createkategori', [PageController::class, 'tambahKategori'])->name('create_kategori');
        Route::get('/admin_update_kategori/{id}', [PagesController::class, 'admin_update_kategori'])->name('update_kategori');
        Route::patch('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::delete('/kategori/{kategori_id}', [KategoriController::class, 'delete'])->name('kategori.delete');

        //rak

        Route::post('/createrak', [RakController::class, 'createRak'])->name('action.createrak');
        Route::get('/createrak', [PageController::class, 'tambahRak'])->name('create_rak');
        Route::get('/admin_update_rak/{id}', [PagesController::class, 'admin_update_rak'])->name('update_rak');
        Route::patch('/rak/{id}', [RakController::class, 'update'])->name('rak.update');
        Route::delete('/rak/{rak_id}', [RakController::class, 'delete'])->name('rak.delete');

        //buku
        Route::post('/createbuku', [BukuController::class, 'createBuku'])->name('action.createbuku');
        Route::get('/createbuku', [PageController::class, 'tambahBuku'])->name('create_buku');
        Route::get('/admin_update_buku/{id}', [PagesController::class, 'admin_update_buku'])->name('update_buku');
        Route::patch('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
        Route::delete('/buku/{buku_id}', [BukuController::class, 'delete'])->name('buku.delete');

        //peminjaman
        Route::get('/pinjam/{id}', [PeminjamanDetailController::class, 'store'])->name('action.pinjam');

        //PEMINJAMAN
        Route::controller(PeminjamanController::class)->group(function () {
            Route::put('/peminjaman/{id}', 'update')->name('action.peminjaman.update');
            Route::delete('/hapus-peminjaman/{id}', 'destroy')->name('peminjaman.delete');
        });

        Route::get('/admin_update_peminjaman/{id}', [PagesController::class, 'admin_update_peminjaman'])->name('update_peminjaman');
    });
});


Route::get('/login', [PagesController::class, 'loginPage'])->name('login');
Route::get('/register', [PagesController::class, 'registerPage'])->name('register');
Route::post('/user/register', [UsersController::class, 'register'])->name('user.register');
Route::post('/user/login', [UsersController::class, 'login'])->name('user.login');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
