<?php

use App\Http\Controllers\Api\GoogleLoginController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Route::get('callback', [GoogleLoginController::class, 'callbackFromGoogle']);
Route::get('profile', [GoogleLoginController::class, 'profile'])->name('profiles');
//Route::post('logout', [GoogleLoginController::class, 'logout'])->name('logout');
