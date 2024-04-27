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
