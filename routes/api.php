<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PenjemputanController;
use App\Http\Controllers\KoinController;
use App\Http\Controllers\SedekahController;
use App\Http\Controllers\RequestSedekahController;
use App\Http\Controllers\RequestSampahController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// route login
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

// route untuk outlite
Route::get('/outlets', [OutletController::class, 'index']);
Route::get('/outlets/{id}', [OutletController::class, 'show']);
Route::post('/outlets', [OutletController::class, 'store']);
Route::post('/outlets/{id}', [OutletController::class, 'update']);
Route::delete('/outlets/{id}', [OutletController::class, 'destroy']);

// penjemputan
Route::get('/penjemputans', [PenjemputanController::class, 'index']);
Route::get('/penjemputans/{id}', [PenjemputanController::class, 'show']);
Route::post('/penjemputans', [PenjemputanController::class, 'store']);
Route::post('/penjemputans/{id}', [PenjemputanController::class, 'update']);
Route::delete('/penjemputans/{id}', [PenjemputanController::class, 'destroy']);

// route koin
Route::get('/koins', [KoinController::class, 'index']);
Route::get('/koins/{id}', [KoinController::class, 'show']);
Route::post('/koins', [KoinController::class, 'store']);
Route::post('/koins/{id}', [KoinController::class, 'update']);
Route::delete('/koins/{id}', [KoinController::class, 'destroy']);

// route sedekah
Route::get('/sedekahs', [SedekahController::class, 'index']);
Route::get('/sedekahs/{id}', [SedekahController::class, 'show']);
Route::post('/sedekahs', [SedekahController::class, 'store']);
Route::post('/sedekahs/{id}', [SedekahController::class, 'update']);
Route::delete('/sedekahs/{id}', [SedekahController::class, 'destroy']);

// route untuk sedekah request
Route::resource('request-sedekahs', RequestSedekahController::class)->only(['index', 'store', 'update', 'destroy']);

// request sampah
Route::get('/request_sampahs', [RequestSampahController::class, 'index']);
Route::post('/request_sampahs', [RequestSampahController::class, 'store']);
Route::get('/request_sampahs/{id}', [RequestSampahController::class, 'show']);
Route::put('/request_sampahs/{id}', [RequestSampahController::class, 'update']);
Route::delete('/request_sampahs/{id}', [RequestSampahController::class, 'destroy']);
