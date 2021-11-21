<?php

use App\Http\Controllers\ClassroomController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post('/classroom', ['as' => 'post_classroom', 'uses' => 'App\Http\Controllers\ClassroomController@store']);

Route::post('/classroom', [ClassroomController::class, 'store']);

// Rotas do Semester
Route::get('/api/semester', [SemesterController::class, 'index']);
Route::post('/api/semester/store', [SemesterController::class, 'store']);
Route::get('/api/semester/show', [SemesterController::class, 'show']);
Route::put('/api/semester/update', [SemesterController::class, 'upadate']);
