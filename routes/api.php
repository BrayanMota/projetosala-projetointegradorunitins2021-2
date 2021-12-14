<?php

use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\ClassroomTypeController;
use App\Http\Controllers\Api\MatrixController;
use App\Http\Controllers\Api\OfferSubjectController;
use App\Http\Controllers\Api\ProfessorController;
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

# Routes of Semester

Route::get('/semesters', [SemesterController::class, 'index']);
Route::prefix('semester')->group(function () {
  Route::post('/store', [SemesterController::class, 'store']);
  Route::get('/{id}/show', [SemesterController::class, 'show']);
  Route::put('/{id}/update', [SemesterController::class, 'update']);
  Route::delete('/{id}/delete', [SemesterController::class, 'destroy']);
});

# Routes of ClassroomType

Route::get('/classroomtypes', [ClassroomTypeController::class, 'index']);
Route::prefix('classroomtype')->group(function () {
  Route::post('/store', [ClassroomTypeController::class, 'store']);
  Route::get('/{id}/show', [ClassroomTypeController::class, 'show']);
  Route::put('/{id}/update', [ClassroomTypeController::class, 'update']);
  Route::delete('/{id}/delete', [ClassroomTypeController::class, 'destroy']);
});

# Routes of Classroom
Route::get('/classrooms', [ClassroomController::class, 'index']);
Route::prefix('classroom')->group(function () {
  Route::post('/store', [ClassroomController::class, 'store']);
  Route::get('/{id}/show', [ClassroomController::class, 'show']);
  Route::put('/{id}/update', [ClassroomController::class, 'update']);
  Route::delete('/{id}/delete', [ClassroomController::class, 'destroy']);
});

# Routes of OfferSubjct
Route::get('/offersubjects', [OfferSubjectController::class, 'index']);
Route::prefix('offersubject')->group(function () {
  Route::post('/store', [OfferSubjectController::class, 'store']);
  Route::get('/{id}/show', [OfferSubjectController::class, 'show']);
  Route::put('/{id}/update', [OfferSubjectController::class, 'update']);
  Route::delete('/{id}/delete', [OfferSubjectController::class, 'destroy']);
});

# professor
Route::get('/professors', [ProfessorController::class, 'index']);
Route::get('/professors/{filtro}', [ProfessorController::class, 'search']);

# matrix
Route::get('/matrices', [MatrixController::class, 'index']);
Route::get('/matrices/{filtro}', [MatrixController::class, 'search']);
