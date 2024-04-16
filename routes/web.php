<?php

use App\Http\Controllers\kerjabaktiController;
use App\Http\Controllers\bendaharaController;
use App\Http\Controllers\DaftarAnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\inventarisController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pemasukanController;
use App\Http\Controllers\pengeluaranController;
use App\Http\Controllers\templateController;
use App\Http\Controllers\peminjamanController;
use Illuminate\Auth\Events\Login;

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

Route::get('/login', function () {
    return view('login');
});

Route::post('/dashboard', [loginController::class, 'test']);

Route::get('/templates', [templateController::class, 'index']);

//testing pemasukan
Route::get('/pemasukan', [pemasukanController::class, 'index']);

//Kerja Bakti
Route::get('/kerjabakti', [kerjabaktiController::class, 'index']);

//testing bendahara
Route::get('/pemasukan', [pemasukanController::class, 'index']);
Route::get('/pengeluaran', [pengeluaranController::class, 'index']);
Route::get('/dashboardBendahara', [bendaharaController::class, 'index']);
Route::get('/keuanganBendahara', [bendaharaController::class, 'keuangan']);
Route::get('/akunBendahara', [bendaharaController::class, 'akun']);

//peminjaman
Route::get('/peminjaman', [peminjamanController::class, 'index']);


//Data keluarga
Route::get('/DaftarAnggota', [DaftarAnggotaController::class, 'index']);
Route::get('/Dashboard', [DashboardController::class, 'index']);

Route::get('/inventaris',[inventarisController::class, 'index']);

