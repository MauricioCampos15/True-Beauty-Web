<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TipController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::apiResource('products', ProductController::class);

Route::get('/products', [ProductController::class, 'index']);
Route::post('/products', [ProductController::class, 'store']);

// Rutas para mostrar, actualizar y eliminar un producto específico
Route::get('/products/{product}', [ProductController::class, 'show']);
Route::put('/products/{product}', [ProductController::class, 'update']);
Route::delete('/products/{product}', [ProductController::class, 'destroy']);

Route::prefix('tips')->group(function () {
    Route::get('/', [TipController::class, 'index']);
    Route::get('/{tip}', [TipController::class, 'edit']);
    Route::post('/', [TipController::class, 'store']);
    Route::put('/{tip}', [TipController::class, 'update']);
    Route::delete('/{tip}', [TipController::class, 'destroy']);
});

