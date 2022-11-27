<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\CustomerController;



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

//Public Routes
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('me', [AuthController::class, 'me']);
Route::get('tikets', [TiketController::class, 'index']);
Route::post('tikets', [TiketController::class, 'store']);
Route::get('tikets/{id}', [TiketController::class, 'show']);
Route::put('tikets/{id}', [TiketController::class, 'update']);
Route::delete('tikets/{id}', [TiketController::class, 'destroy']);

Route::post('transaksi', [TransaksiController::class, 'store']);
Route::get('transaksi', [TransaksiController::class, 'index']);
Route::put('transaksi/{id}', [TransaksiController::class, 'update']);
Route::delete('transaksi/{id}', [TransaksiController::class, 'destroy']);


//Route::post('/books', [BookController::class, 'store']);
//Route::put('/books/{id}', [BookController::class, 'update']);
//Route::delete('/books/{id}', [BookController::class, 'destroy']);

//protected routes

Route::middleware('auth:sanctum')->group(function(){
    Route::resource('tiket', TiketController::class)->except(
        ['create', 'edit', 'index', 'show']
    );
    
    Route::resource('tikets', TransaksiController::class)->except(
        ['create', 'edit']
    );
    Route::post('logout', [TiketController::class, 'logout']);
});

