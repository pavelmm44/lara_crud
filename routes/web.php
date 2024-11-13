<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('messages', MessagesController::class);
Route::post('messages/valid', [MessagesController::class, 'sendValid']);

Route::resource('events', EventController::class);

Route::resource('categories', CategoryController::class);

Route::resource('shops', CategoryController::class);
Route::resource('products', CategoryController::class);

Route::get('products/{product}/shops', [ProductController::class, 'editShops'])->name('products.shops.edit');
Route::post('products/{product}/shops', [ProductController::class, 'saveShops'])->name('products.shops.save');
