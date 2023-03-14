<?php

use App\Http\Controllers\Api\{AuthController, BengkelController};
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
    Route::get('/v1/bengkel', [BengkelController::class, 'index']);
    Route::get('/v1/bengkel/{id}', [BengkelController::class, 'show']);
    Route::post('/v1/daerah/provinsi', [BengkelController::class, 'provinsi']);
    Route::get('/v1/daerah/kota', [BengkelController::class, 'kota']);
    Route::get('/v1/daerah/kecamatan', [BengkelController::class, 'kecamatan']);
    Route::get('/v1/daerah/desa', [BengkelController::class, 'desa']);
    Route::post('/v1/bengkel', [BengkelController::class, 'store']);
    Route::post('/v1/bengkel/{id}', [BengkelController::class, 'update']);
    Route::delete('/v1/bengkel/{id}', [BengkelController::class, 'delete']);
    // Route::post('/v1/image', [BengkelController::class, 'image']);
});
