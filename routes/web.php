<?php

use App\Http\Controllers\Api\GoogleLoginController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});
Auth::routes();
//Route::get('/dashboard', [GoogleLoginController::class, 'logged'])->name('logged');
Route::post('logout', [LoginController::class,'logout'])->name('logout');
Route::get('auth/google', [GoogleLoginController::class, 'loginWithGoogle'])->name('login');
Route::get('/callback', [GoogleLoginController::class, 'callbackFromGoogle']);
