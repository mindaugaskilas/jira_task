<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\TaskController;
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


Route::get('/', [TaskController::class, 'index'])->name('task.list');
Route::get('/task/create', [TaskController::class, 'create']);
Route::post('/task/store', [TaskController::class, 'store']);
Route::get('/task/{id}', [TaskController::class, 'show'])->name('task.show');
Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::post('/task/{id}/update', [TaskController::class, 'update'])->name('task.update');

Route::get('task/{id}/comment/create', [CommentController::class, 'create'])->name('comment.create');
Route::post('task/{id}/comment/store', [CommentController::class, 'store'])->name('comment.store');
Route::get('task/{id}/comment/{commentId}/edit', [CommentController::class, 'edit'])->name('comment.edit');
Route::post('task/{id}/comment/{commentId}/update', [CommentController::class, 'update'])->name('comment.update');
