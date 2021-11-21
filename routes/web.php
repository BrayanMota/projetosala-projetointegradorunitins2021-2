<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['Hello' => 'Wolrd']);
});

Route::get('/semester/index', 'App\Http\Controllers\SemesterController@index')->name('semester.index');

Route::get('/semester/create', 'App\Http\Controllers\SemesterController@create')->name('semester.create');

Route::post('/semester/store', 'App\Http\Controllers\SemesterController@store')->name('semester.store');

Route::delete('/semester/destroy/{id}', 'App\Http\Controllers\SemesterController@destroy')->name('semester.destroy');
