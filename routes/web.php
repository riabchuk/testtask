<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index'])->name('companies.index');
Route::get('/history/{id}', [MainController::class, 'history'])->name('companies.history');
