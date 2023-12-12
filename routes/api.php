<?php

use App\Http\Controllers\PembelianController;
use App\Http\Controllers\TiketKeretaController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

//======= Untuk Client
Route::get('/pembelianDatas', [PembelianController::class, 'index']);
Route::get('/pembelianDatas/{id}', [PembelianController::class, 'show']);
Route::post('/pembelianDatas', [PembelianController::class, 'create']);
Route::put('/pembelianDatas/{id}', [PembelianController::class, 'edit']);
Route::delete('/pembelianDatas/{id}', [PembelianController::class, 'destroy']);
//======= Untuk Server
Route::get('/datas', [TiketKeretaController::class, 'index']);
Route::get('/datas/{id}', [TiketKeretaController::class, 'searchId']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/me', [UserController::class, 'me']);
    Route::post('/datas', [TiketKeretaController::class, 'addData']);
    Route::put('/datas/{id}', [TiketKeretaController::class, 'updateData']);
    Route::delete('/datas/{id}', [TiketKeretaController::class, 'deleteData']);
});
