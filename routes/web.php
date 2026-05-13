<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::controller(TaskController::class)->group(function () {
    Route::get('/', 'index')->name('tasks.overview');
    Route::get('/create', 'create')->name('tasks.create');
    Route::post('/', 'store')->name('tasks.store');
});