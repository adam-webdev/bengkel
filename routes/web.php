<?php

use App\Http\Controllers\{DashboardController, ShipmentController, TransaksiController, UserController};
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('transaksi', TransaksiController::class);
Route::get('/transaksi/hapus/{id}', [TransaksiController::class, "delete"]);

Route::resource('shipment', ShipmentController::class);
Route::get('/shipment/hapus/{id}', [ShipmentController::class, "delete"]);
Route::get('/shipment/tambah/{id}', [ShipmentController::class, "create"])->name('shipment.tambah');