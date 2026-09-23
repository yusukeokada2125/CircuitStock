<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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
