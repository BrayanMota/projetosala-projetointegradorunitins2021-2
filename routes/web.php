<?php

use App\Http\Controllers\Api\GoogleLoginController;
use Illuminate\Support\Facades\Route;

// Route::resource('/semester', 'SemesterController');

// Route::resource('/classroom', 'ClassroomController');

// Route::get('/campus/{id}/courses', 'PublicController@getCoursesByCampusId')->name('public.campus.courses');
Route::get('/campus/{id}/courses', 'PublicController@getCoursesByCampusId')->name('public.campus.courses');

Route::get('/', function () {
  return view('welcome');
});

Route::get('/dashboard', [GoogleLoginController::class, 'logged'])->name('logged');
Route::get('auth/google', [GoogleLoginController::class, 'loginWithGoogle']);
Route::get('auth/google/callback', [GoogleLoginController::class, 'callbackFromGoogle']);
