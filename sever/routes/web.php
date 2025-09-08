<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Auth\AuthController;

Route::get('/test-base',[AuthController::class,'testBase']);
Route::get('/test-auth',[AuthController::class,'testAuth']);