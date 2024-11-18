<?php

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::resource('messages', MessagesController::class)->middleware('auth');
Route::post('messages/valid', [MessagesController::class, 'sendValid']);

Route::resource('events', EventController::class);

Route::resource('categories', CategoryController::class);

Route::resource('shops', ShopController::class);
Route::delete('shops/{shop}/products', [ShopController::class, 'deleteProducts']);

Route::get('products/prices', [ProductController::class, 'getProductsShopsPrice']);
Route::resource('products', ProductController::class);

Route::get('products/{product}/shops', [ProductController::class, 'editShops'])->name('products.shops');
Route::post('products/{product}/shops', [ProductController::class, 'saveShops']);

Route::get('products/{product}/prices', [ProductController::class, 'getShopsPrice']);
Route::get('products/best/price', [ProductController::class, 'getBestPriceProducts']);

Route::middleware('guest')->group(function () {
    Route::get('login', [SessionController::class, 'create'])->name('login');
    Route::post('login', [SessionController::class, 'store']);

    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);


});

Route::middleware('auth')->group(function () {
    Route::post('logout', [SessionController::class, 'destroy'])->name('logout');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
});
