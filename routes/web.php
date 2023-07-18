<?php

use App\Http\Controllers\{BengkelController, DashboardController, JawabanController, PertanyaanController, UserController, TransaksiController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();
Route::get('/dashboard', [DashboardController::class, "index"])->name('dashboard');
// hanya admin yang dapat akses route ini
Route::resource('/user', UserController::class);
Route::get('/user/hapus/{id}', [UserController::class, "delete"]);

Route::resource('/pertanyaan', PertanyaanController::class);
Route::get('/pertanyaan/hapus/{id}', [PertanyaanController::class, "delete"]);

Route::resource('/jawaban', JawabanController::class);
Route::get('/jawaban/hapus/{id}', [JawabanController::class, "delete"]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/bengkel', BengkelController::class);
Route::get('/bengkel/hapus/{id}', [BengkelController::class, "delete"]);

Route::resource('/order', TransaksiController::class);
Route::get('/order/hapus/{id}', [TransaksiController::class, "delete"]);

Route::get('/kota', [BengkelController::class, "kota"]);
Route::get('/kecamatan', [BengkelController::class, "kecamatan"]);
Route::get('/desa', [BengkelController::class, "desa"]);
// Route::resource('transaksi', TransaksiController::class);
// Route::get('/transaksi/hapus/{id}', [TransaksiController::class, "delete"]);