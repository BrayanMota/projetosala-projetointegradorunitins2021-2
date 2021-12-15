<?php

use App\Http\Controllers\Api\GoogleLoginController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

// Route::resource('/semester', 'SemesterController');

// Route::resource('/classroom', 'ClassroomController');

// Route::get('/campus/{id}/courses', 'PublicController@getCoursesByCampusId')->name('public.campus.courses');
Route::get('/campus/{id}/courses', 'PublicController@getCoursesByCampusId')->name('public.campus.courses');

Route::get('/', function () {
  return view('welcome');
});

Route::get('/login', [LoginController::class, 'login']);
Route::get('/dashboard', [GoogleLoginController::class, 'loginWithGoogle'])->name('logged');
Route::get('/auth/google', [GoogleLoginController::class, 'loginWithGoogle']);
Route::get('/callback', [GoogleLoginController::class, 'callbackFromGoogle']);
