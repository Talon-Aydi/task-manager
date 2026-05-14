<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::controller(TaskController::class)->group(function () {
    Route::get('/', 'index')->name('tasks.overview');
    Route::get('/create', 'create')->name('tasks.create');
    Route::get('/{id}/edit', 'edit')->name('tasks.edit');
    Route::post('/', 'store')->name('tasks.store');
    Route::put('/{task}', 'update')->name('tasks.update');
});