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
