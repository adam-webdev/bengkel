<?php

use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BengkelController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PertanyaanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/v1/register', [AuthController::class, 'register']);
Route::post('/v1/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    // route daerah indonesia
    Route::post('/v1/daerah/provinsi', [BengkelController::class, 'provinsi']);
    Route::post('/v1/daerah/kota', [BengkelController::class, 'kota']);
    Route::post('/v1/daerah/kecamatan', [BengkelController::class, 'kecamatan']);
    Route::post('/v1/daerah/desa', [BengkelController::class, 'desa']);
    // get nama daerah
    Route::post('/v1/nama-daerah/provinsi', [BengkelController::class, 'provinsiName']);
    Route::post('/v1/nama-daerah/kota', [BengkelController::class, 'kotaName']);
    Route::post('/v1/nama-daerah/kecamatan', [BengkelController::class, 'kecamatanName']);
    Route::post('/v1/nama-daerah/desa', [BengkelController::class, 'desaName']);
    // route bengkel
    Route::get('/v1/bengkel', [BengkelController::class, 'index']);
    Route::get('/v1/bengkel/{id}', [BengkelController::class, 'show']);
    Route::post('/v1/bengkel', [BengkelController::class, 'store']);
    Route::post('/v1/bengkel/{id}', [BengkelController::class, 'update']);
    Route::delete('/v1/bengkel/{id}', [BengkelController::class, 'delete']);
    // route user
    Route::get('/v1/user', [UserController::class, 'index']);
    Route::get('/v1/user/{id}', [UserController::class, 'show']);
    // Route::post('/v1/user', [UserController::class, 'store']);
    Route::post('/v1/user/{id}', [UserController::class, 'update']);
    Route::delete('/v1/user/{id}', [UserController::class, 'delete']);
    Route::post('/v1/user/change-password/{id}', [UserController::class, 'password']);

    Route::get('/v1/pertanyaan', [PertanyaanController::class, 'index']);
    Route::get('/v1/jawaban/{id}', [PertanyaanController::class, 'jawaban']);
    Route::get('/v1/jawaban/{id}/{query}', [PertanyaanController::class, 'jawabanwithquery']);

    Route::get('/v1/pertanyaan/{id}', [PertanyaanController::class, 'pertanyaan']);

    // Route::post('/v1/image', [BengkelController::class, 'image']);
});