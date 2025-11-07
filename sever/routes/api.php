<?php

use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\SportTypeController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PositionAliasController;
use App\Http\Controllers\PositionController;

$controllerList = [
    'users' => UserController::class,
    'players' => PlayerController::class,
    'sport_type' => SportTypeController::class,
    'organizations' => OrganizationController::class,
    'teams' => TeamController::class,
    'position_alias' => PositionAliasController::class,
    'positions' => PositionController::class
];


Route::middleware('jwt.auth')->group(function () use ($controllerList) {
    // General
    foreach ($controllerList as $uri => $controllerClass) { 
        Route::get("/$uri", [$controllerClass, 'index']);
        Route::post("/$uri", [$controllerClass, 'store']);
        Route::get("/$uri/{id}", [$controllerClass, 'show']);
        Route::post("/$uri/{id}", [$controllerClass, 'update']);
        Route::delete("/$uri/{id}", [$controllerClass, 'delete']);
        Route::post("/$uri/{id}/restore", [$controllerClass, 'restore']);
        Route::delete("/$uri/{id}/force", [$controllerClass, 'forceDelete']);
    }

    // Specific routing

    Route::get('/organizations/{id}/teams', [TeamController::class, 'getByParentId']);
    Route::get('/sport_types/{id}/position_alias', [PositionAliasController::class, 'getByParentId']);
    Route::get('/teams/{id}/players', [PlayerController::class, 'getByParentId']);
});


Route::get('/test-base',[AuthController::class,'testBase']);
Route::get('/test-auth',[AuthController::class,'testAuth']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('jwt.auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});