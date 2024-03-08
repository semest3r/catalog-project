<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContentManagementController;
use App\Http\Controllers\GroupCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/group-category', [GroupCategoryController::class, 'show'])->name('group_category.show');
    Route::get('/group-category/create', [GroupCategoryController::class, 'create'])->name('group_category.create');
    Route::post('/group-category/create', [GroupCategoryController::class, 'store'])->name('group_category.store');
    Route::get('/group-category/edit/{id}', [GroupCategoryController::class, 'edit'])->name('group_category.edit');
    Route::patch('/group-category/edit/{id}', [GroupCategoryController::class, 'update'])->name('group_category.update');
    Route::delete('/group-category/delete/{id}', [GroupCategoryController::class, 'destroy'])->name('group_category.delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/category', [CategoryController::class, 'show'])->name('category.show');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/create', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::patch('/category/edit/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/product', [ProductController::class, 'show'])->name('product.show');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/create', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::patch('/product/edit/{id}', [ProductController::class, 'update'])->name('product.update');
    Route::delete('product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/subscriber', [SubscriberController::class, 'show'])->name('subscriber.show');
    Route::get('/subscriber/create', [SubscriberController::class, 'create'])->name('subscriber.create');
    Route::post('/subscriber/create', [SubscriberController::class, 'store'])->name('subscriber.store');
    Route::get('/subscriber/edit/{id}', [SubscriberController::class, 'edit'])->name('subscriber.edit');
    Route::patch('/subscriber/edit/{id}', [SubscriberController::class, 'update'])->name('subscriber.update');
    Route::delete('subscriber/delete/{id}', [SubscriberController::class, 'destroy'])->name('subscriber.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/conten-management', [ContentManagementController::class, 'show'])->name('content_management.show');
    Route::get('/content-management/create', [ContentManagementController::class, 'create'])->name('content_management.create');
    Route::post('/content-management/create', [ContentManagementController::class, 'store'])->name('content_management.store');
    Route::get('/content-management/edit/{id}', [ContentManagementController::class, 'edit'])->name('content_management.edit');
    Route::patch('/content-management/edit/{id}', [ContentManagementController::class, 'update'])->name('content_management.update');
    Route::delete('content-management/delete/{id}', [ContentManagementController::class, 'destroy'])->name('content_management.delete');
});

require __DIR__ . '/auth.php';
