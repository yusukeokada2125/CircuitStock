<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [
    LoginController::class, 'store'
]);

Route::post('/logout', [
    LoginController::class, 'destroy'
]);

Route::get('/parts', function () {
    return view('parts.index');
})->middleware('auth');

Route::get('/categories',[
    CategoryController::class, 'index'
])->middleware('auth')->name('categories.index');

Route::post('/categories', [
    CategoryController::class, 'store'
])->middleware('auth')->name('categories.store');
