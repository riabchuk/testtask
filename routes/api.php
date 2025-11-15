<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::post('/company', [CompanyController::class, 'create'])->name('company');
Route::get('/company/{edrpou}/versions', [CompanyController::class, 'versions'])->name('versions');
