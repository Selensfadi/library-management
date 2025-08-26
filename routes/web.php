<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);
Route::resource('orders', OrderController::class);
Route::resource('users', UserController::class);
