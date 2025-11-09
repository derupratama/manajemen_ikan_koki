<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('welcome');
});



Route::get('/welcome',[HomeController::class, 'index'])->name('welcome');

Route::get('/home', function () {
    return view('home');
});

Route::get('/semua-produk', function () {
    return view('semua-produk');
});

