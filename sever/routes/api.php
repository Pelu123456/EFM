<?php

use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;

$controllerList = [
    'users' => UserController::class,
];

Route::middleware('jwt.auth')->group(function () use ($controllerList) {
    foreach ($controllerList as $uri => $controllerClass) {
        Route::post("/$uri", [$controllerClass, 'store']);
        Route::get("/$uri/{id}", [$controllerClass, 'show']);
        Route::post("/$uri/{id}", [$controllerClass, 'update']);
        Route::delete("/$uri/{id}", [$controllerClass, 'delete']);
        Route::post("/$uri/{id}/restore", [$controllerClass, 'restore']);
        Route::delete("/$uri/{id}/force", [$controllerClass, 'forceDelete']);
    }
});


Route::get('/test-base',[AuthController::class,'testBase']);
Route::get('/test-auth',[AuthController::class,'testAuth']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt.auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});