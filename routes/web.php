<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Route::get('/', function () {
    return view('welcome');
});


Route::get('/welcome',[HomeController::class, 'index'])->name('welcome');