<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IsiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanContoller;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PetugasController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('rakyat', function () {
    return view('rakyat');
});

Route::get('home', function () {
    return view('home');
});

Route::get('hasil', function () {
    return view('hasil');
});

Route::get('tambah', function () {
    return view('tambah-petugas');
});

Route::get('halaman-update', function () {
    return view('update');
});

Route::get('isi', function () {
    return view('isi-pengaduan');
});

Route::get('daftar-petugas', function () {
    return view('daftar-petugas');
});


Route::post('/tambah-petugas', [PetugasController::class, 'proses_tambah_petugas']);

Route::get('/rakyat', [LaporanController::class, 'laporan']);

Route::get('/hasil/detail_pengaduan/{id}', [PengaduanContoller::class, 'detail_pengaduan']);

Route::get('/hasil/update_pengaduan/{id}', [PengaduanContoller::class, 'edit']);

Route::put('/hasil/update_pengaduan/{id}', [PengaduanContoller::class, 'update_pengaduan'])->name('updatepengaudan');

Route::get('/hasil', [PengaduanContoller::class, 'pengaduan']);

Route::get('/detail', [PengaduanContoller::class, 'pengaduan']);

Route::get('/daftar-petugas', [PetugasController::class, 'petugas']);

Route::get('/hasil/hapus/{id_pengaduan}', [PengaduanContoller::class, 'hapus']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [HomeController::class, 'home']);
    Route::post('/isi-pengaduan', [IsiController::class, 'proses_tambah_pengaduan']);

// });

require __DIR__ . '/auth.php';
