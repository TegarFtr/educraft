<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\PertanyaanController;
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
Route::get('AdminDashboard', [AdminController::class, 'index']);

Route::resource('guru', GuruController::class);
Route::resource('kategori', KategoriController::class);

Route::resource('kuis-master', KuisController::class);
Route::resource('pertanyaan', PertanyaanController::class);
Route::resource('materi-master', MateriController::class);
Route::resource('kelas-master', KelasController::class);


Route::get('dashboard', [MuridController::class, 'dashboard']);
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

