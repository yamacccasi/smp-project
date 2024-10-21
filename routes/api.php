<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// PRODUCT
Route::get('products/mpn/{mpn}', [ProductController::class, 'findByMPN']);
Route::get('products/id/{id}', [ProductController::class, 'show']);
Route::post('products/', [ProductController::class, 'store']);
Route::put('products/id/{id}', [ProductController::class, 'update']);
Route::delete('products/id/{id}', [ProductController::class, 'destroy']);
Route::get('products', [ProductController::class, 'index']);




use App\Http\Controllers\RetailerController;

//Route::apiResource('retailers', RetailerController::class);
