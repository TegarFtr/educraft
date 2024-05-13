<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\SesiController;
use Illuminate\Contracts\Session\Session;
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
Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index'])->name('awal');
    Route::get('/login', [SesiController::class, 'login'])->name('login');
    Route::post('/login', [SesiController::class, 'loginProses']);
    Route::get('registrasi', function(){ return view('register');})->name('register');
    Route::post('registrasi-akun', [SesiController::class, 'registrasi']);
});

Route::get('/logout', [SesiController::class, 'logout']);
Route::get('/home', function () {
    return redirect('')->route('awal');
});
Route::get('dashboard', [MuridController::class, 'dashboard']);
Route::get('AdminDashboard', [AdminController::class, 'index']);

Route::get('kategori', [AdminController::class, 'kategori']);
Route::get('kategori/tambahkategori', [AdminController::class, 'tambahkategori']);
Route::get('kategori/editkategori/', [AdminController::class, 'editkategori']);
Route::get('kategori/hapuskategori/{id}', [AdminController::class, 'hapuskategori']);

Route::get('kuismaster', [AdminController::class, 'kuismaster']);
Route::post('kuismaster/tambahkuis', [AdminController::class, 'tambahkuis']);
Route::get('kuismaster/editkuis', [AdminController::class, 'editkuis']);
Route::get('kuismaster/hapuskuis/{id}', [AdminController::class, 'editkuis']);
Route::get('kuismaster/tambahpertanyaan/{id}', [AdminController::class, 'tambahPertanyaan']);
Route::get('kuismaster/tambahpertanyaanbaru', [AdminController::class, 'tambahPertanyaanBaru']);
Route::get('kuismaster/editpertanyaanbaru', [AdminController::class, 'editPertanyaanBaru']);
Route::get('kuismaster/hapuspertanyaanbaru/{id}', [AdminController::class, 'hapusPertanyaanBaru']);

Route::get('materimaster', [AdminController::class, 'materi']);
Route::get('tambah-materi', [AdminController::class, 'tambahMateri']);
Route::post('tambah-materi/store', [AdminController::class, 'storeMateri']);

Route::get('kelasmaster', [AdminController::class, 'kelas']);
Route::get('tambahkelasmaster', [AdminController::class, 'tambahkelas']);
// Aktivitas
Route::get('aktivitas', [MuridController::class, 'aktivitas']);

// Materi
Route::get('materi', [MuridController::class, 'materi']);
Route::get('materi/bacamateri/{id}', [MuridController::class, 'bacamateri']);
Route::get('materi/bacamateri/lihatpdf/{id}', [MuridController::class, 'viewPDF']);

// Kuis
Route::get('kuis', [MuridController::class, 'kuis']);
Route::get('kuis/mulaikuis/{id}', [MuridController::class, 'startkuis']);
Route::post('kuis/submitkuis', [MuridController::class, 'submit_questions']);
Route::get('kuis/lihathasil/{id}', [MuridController::class, 'view_result']);

// Kelas
Route::get('kelas', [MuridController::class, 'kelas']);
Route::get('join-kelas', [MuridController::class, 'joinKelas']);

