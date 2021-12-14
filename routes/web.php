<?php

use App\Http\Controllers\Api\GoogleLoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::resource('/semester', 'SemesterController');

// Route::resource('/classroom', 'ClassroomController');

// Route::get('/campus/{id}/courses', 'PublicController@getCoursesByCampusId')->name('public.campus.courses');

Route::get('/campus/{id}/courses', 'PublicController@getCoursesByCampusId')->name('public.campus.courses');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', [GoogleLoginController::class, 'logged'])->name('logged');
Auth::routes();

Route::get('auth/google', [GoogleLoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);

