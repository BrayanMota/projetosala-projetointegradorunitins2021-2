<?php

use Laravel\Sail\Console\PublishCommand;
use App\Http\Controllers\Api\GoogleLoginController;
use Illuminate\Support\Facades\Route;

// Route::resource('/semester', 'SemesterController');

// Route::resource('/classroom', 'ClassroomController');

// Route::get('/campus/{id}/courses', 'PublicController@getCoursesByCampusId')->name('public.campus.courses');

Route::get('/campus/{id}/courses', 'PublicController@getCoursesByCampusId')->name('public.campus.courses');

Route::get('/loginpage', [GoogleLoginController::class, 'loginPage'])->name('loginpage');
Route::get('/login', [GoogleLoginController::class, 'loginWithGoogle'])->name('login');
Route::get('/callback', [GoogleLoginController::class, 'callbackFromGoogle'])->name('callback');