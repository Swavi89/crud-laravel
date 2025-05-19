<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Dashboard */
Route::get('/', 'LoginController@dashboard')->middleware('auth');

/* Login & Logout */
Route::get('login', 'LoginController@login')->name('login');
Route::post('/login', 'LoginController@authenticate');
Route::get('/logout', 'LoginController@logout');

/* Students */
Route::get('/students', 'StudentController@student')->middleware('auth');
Route::get('/students/add', 'StudentController@addStudent')->middleware('auth');
Route::get('/students/{id}/edit', 'StudentController@editStudent')->middleware('auth');
Route::post('/students/save', 'StudentController@saveStudent')->middleware('auth');
Route::get('/students/{id}/delete', 'StudentController@deleteStudent')->middleware('auth');
