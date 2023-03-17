<?php

use App\Http\Controllers\Api\{AuthController, BengkelController, UserController};
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
    Route::get('/v1/daerah/kota', [BengkelController::class, 'kota']);
    Route::get('/v1/daerah/kecamatan', [BengkelController::class, 'kecamatan']);
    Route::get('/v1/daerah/desa', [BengkelController::class, 'desa']);
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

    // Route::post('/v1/image', [BengkelController::class, 'image']);
});
