<?php

use App\Http\Controllers\ApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products/{id}', [ApiController::class, 'getProducts'])->name('api.get_products');
Route::get('/exclusive-products', [ApiController::class, 'getExclusiveProducts'])->name('api.get_exclusive_products');
Route::get('/categories/{id}', [ApiController::class, 'getCategories'])->name('api.get_categories');
Route::post('/subscriber/create', [ApiController::class, 'createSubscriber'])->name('api.create_subscriber');
Route::get('/products-all', [ApiController::class, 'getAllProducts'])->name('api.get_all_products');