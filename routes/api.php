<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/tasks', [TaskController::class, 'indexApi']);
Route::get('/tasks/{id}', [TaskController::class, 'showApi']);
Route::get('/tasks/completed', [TaskController::class, 'completedApi']);
Route::get('/tasks/incomplete', [TaskController::class, 'incompleteApi']);
Route::post('/tasks', [TaskController::class, 'storeApi']);
Route::put('/tasks/{id}', [TaskController::class, 'updateApi']);
Route::delete('/tasks/{id}', [TaskController::class, 'destroyApi']);
Route::put('/tasks/{id}/status', [TaskController::class, 'updateStatusApi']);

