<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::controller(TaskController::class)->name('tasks.')->group(function () {
    Route::get('/', 'index')->name('overview');
    Route::get('/create', 'create')->name('create');
    Route::get('/{task}/edit', 'edit')->name('edit');
    Route::post('/', 'store')->name('store');
    Route::put('/{task}', 'update')->name('update');
});