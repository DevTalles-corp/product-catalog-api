<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/hello', function (Request $request) {
    return response()->json(["message" => "Hola desde Laravel"]);
});

Route::apiResource("products", ProductController::class);
