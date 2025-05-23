<?php

use App\Http\Controllers\TodoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/todo', [TodoController::class, 'index']);
Route::post('/todo', [TodoController::class, 'store']);
Route::get('/todo/{id}', [TodoController::class, 'show']);
Route::put('/todo/{id}', [TodoController::class, 'update']);
Route::delete('/todo/{id}', [TodoController::class, 'destroy']);
Route::get('/todo-search/{todo}', [TodoController::class, 'search']);