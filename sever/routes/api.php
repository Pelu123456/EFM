<?php

use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;
use App\Http\Controllers\Auth\AuthController;

Route::get('/test-base',[AuthController::class,'testBase']);
Route::get('/test-auth',[AuthController::class,'testAuth']);

// Route::middleware(['jwt.auth'])->group(function () {
//     Route::post('/user/store',[AuthController::class,'store'])->name('users.store');
// });
// Route::post('/user/store',[AuthController::class,'store'])->withoutMiddleware([Authenticate::class])->name('users.store');
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt.auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});