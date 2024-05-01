<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SesiController;
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

Route::get('/', [AdminController::class, 'index']);
Route::get('/login', [SesiController::class, 'login'])->name('login');
Route::post('/login', [SesiController::class, 'loginProses']);
Route::get('registrasi', function(){ return view('register');})->name('register');
Route::post('registrasi-akun', [SesiController::class, 'registrasi']);

Route::get('/logout', [SesiController::class, 'logout']);

Route::get('dashboard', function () {
    return view('dashboard');
});

// Aktivitas
Route::get('aktivitas/selesai', function () {
    return view('aktivitas.selesai');
})->name('aktivitas');
Route::get('aktivitas/berjalan', function () {
    return view('aktivitas.berjalan');
})->name('berjalan');

// Materi
Route::get('materi', function () {
    return view('materi.semua');
});
Route::get('materi/sejarah', function () {
    return view('materi.sejarah');
})->name('sejarah');
Route::get('materi/ekonomi', function () {
    return view('materi.ekonomi');
})->name('ekonomi');
Route::get('materi/geografi', function () {
    return view('materi.geografi');
})->name('geografi');
Route::get('materi/sosiologi', function () {
    return view('materi.sosiologi');
})->name('sosiologi');

// Kuis
Route::get('kuis', function () {
    return view('kuis.semua');
});
Route::get('kuis/sejarah', function () {
    return view('kuis.sejarah');
})->name('Kuissejarah');
Route::get('kuis/ekonomi', function () {
    return view('kuis.ekonomi');
})->name('Kuisekonomi');
Route::get('kuis/geografi', function () {
    return view('kuis.geografi');
})->name('Kuisgeografi');
Route::get('kuis/sosiologi', function () {
    return view('kuis.sosiologi');
})->name('Kuissosiologi');

// Kelas
Route::get('kelas', function () {
    return view('kelas.kelas');
});
