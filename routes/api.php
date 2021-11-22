<?php

use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\ClassroomTypeController;
use App\Http\Controllers\Api\SemesterController;
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

// Routes of Semester
Route::prefix('semester')->group(function () {
  Route::get('/', [SemesterController::class, 'index']);
  Route::post('/store', [SemesterController::class, 'store']);
  Route::get('/{id}/show', [SemesterController::class, 'show']);
  Route::put('/{id}/update', [SemesterController::class, 'update']);
  Route::delete('/{id}/delete', [SemesterController::class, 'destroy']);
});

//Routes of ClassroomType
Route::prefix('classroomtype')->group(function () {
  Route::get('/', [ClassroomTypeController::class, 'index']);
  Route::post('/store', [ClassroomTypeController::class, 'store']);
  Route::get('/{id}/show', [ClassroomTypeController::class, 'show']);
  Route::put('/{id}/update', [ClassroomTypeController::class, 'update']);
  Route::delete('/{id}/delete', [ClassroomTypeController::class, 'destroy']);
});

//Routes of Classroom
Route::prefix('classroom')->group(function () {
  Route::get('/', [ClassroomController::class, 'index']);
  Route::post('/store', [ClassroomController::class, 'store']);
  Route::get('/{id}/show', [ClassroomController::class, 'show']);
  Route::put('/{id}/update', [ClassroomController::class, 'update']);
  Route::delete('/{id}/delete', [ClassroomController::class, 'destroy']);
});
