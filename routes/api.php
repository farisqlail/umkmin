<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::get('email/verify/{id}', [App\Http\Controllers\Api\AuthController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Api\AuthController::class, 'resend'])->name('verification.resend');

Route::group(['middleware' => ['auth:sanctum', 'verified', 'isAdmin']], function(){
    Route::apiResource('/umkm_prod', App\Http\Controllers\Api\ProdukUmkmController::class);
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'isUser']], function(){
    Route::apiResource('/user', App\Http\Controllers\Api\UserController::class);
});

Route::group(['middleware' => ['auth:sanctum', 'verified', 'isUmkm']], function(){
    Route::apiResource('/foto', App\Http\Controllers\Api\FotoController::class);
    Route::apiResource('/category', App\Http\Controllers\Api\CategoriController::class);
});



