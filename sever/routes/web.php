<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

Route::get('/test',[TestController::class,'test']);

require __DIR__.'/auth.php';
