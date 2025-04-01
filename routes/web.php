<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;

// GET routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
// keep at the bottom of get routes
Route::get('/jobs/{id}', [JobController::class, 'show']);

// POST routes
Route::post('/jobs', [JobController::class, 'store']);
