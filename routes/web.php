<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleLoginController;
// lo tuve que agregrar porque salia error en Auth::routes();
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Google Social Login */
Route::get('/login/google', [App\Http\Controllers\GoogleLoginController::class, 'redirect'])->name('login.google-redirect');

Route::get('/login/google/callback', [App\Http\Controllers\GoogleLoginController::class, 'callback'])->name('login.google-callback');
