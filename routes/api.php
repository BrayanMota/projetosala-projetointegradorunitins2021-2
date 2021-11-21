<?php

use App\Http\Controllers\SemesterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Rotas do Semester
Route::get('/api/semester', [SemesterController::class, 'index']);
Route::post('/api/semester/store', [SemesterController::class, 'store']);
Route::get('/api/semester/show', [SemesterController::class, 'show']);
Route::put('/api/semester/update', [SemesterController::class, 'upadate']);
Route::delete('/api/semester/destroy', [SemesterController::class, 'destroy']);
