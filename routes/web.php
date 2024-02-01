<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/api', function () {
    return view('api');
});
Route::get('tasks/completed', [taskController::class, 'completed']);
Route::get('tasks/incomplete', [taskController::class, 'incomplete']);
Route::resource('tasks', taskController::class);
Route::put('tasks/{id}/status', [taskController::class, 'updateStatus']);
