<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//this macro line registers all 5 required API CRUD endpoints safely:
Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);
