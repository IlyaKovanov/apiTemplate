<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::controller(PostController::class)->group(function () {
    Route::get('/posts', 'index');
    Route::post('/posts', 'store');
    Route::get('/posts/{id}', 'show');
    Route::put('/posts/{id}', 'update');
    Route::delete('/posts/{id}', 'destroy');
});

