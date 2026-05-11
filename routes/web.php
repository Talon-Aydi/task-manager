<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::controller(TaskController::class)->group(function () {
    Route::get('/', 'show')->name('tasks.overview');
    Route::post('/', 'store')->name('tasks.store');
});