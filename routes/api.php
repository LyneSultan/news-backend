<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/admin')->group(function(){
    Route::post('/',[AdminController::class, "create_news"]);
    Route::post('/{id}',[AdminController::class, "restrict_news"]);
    Route::put('/{id}',[AdminController::class, "edit_news"]);
    Route::delete('/{id}',[AdminController::class, "delete_news"]);
});


Route::prefix('/user')->group(function(){
    Route::post('/',[UserController::class, "post_articles"]);
    Route::post('/{id}',[UserController::class, "get_news"]);
});

