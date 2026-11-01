<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilephpController;
use App\Http\Controllers\TaskController;

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');

    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    Route::patch('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

    Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

});