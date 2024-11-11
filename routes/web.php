<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MessagesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('messages', MessagesController::class);
Route::post('messages/valid', [MessagesController::class, 'sendValid']);

Route::resource('events', EventController::class);
