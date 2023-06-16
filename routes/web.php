<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('task/completed', [\App\Http\Controllers\taskController::class, 'completed']);
Route::get('task/incompleted', [\App\Http\Controllers\taskController::class, 'incompleted']);
Route::resource('/task', \App\Http\Controllers\TaskController::class);
Route::put('task/{id}/status', [\App\Http\Controllers\taskController::class, 'updateStatus']);