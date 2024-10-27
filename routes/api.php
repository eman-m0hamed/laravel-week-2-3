<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\PostController ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\FlareClient\Api;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/v1/posts', [PostController::class, 'index']);
Route::post("/v1/posts", [PostController::class, 'store']);
Route::get('/v1/posts/{id}', [PostController::class, 'show']);
Route::post("/v1/login", [AuthController::class, 'login']);
Route::post("/v1/register", [AuthController::class, 'register']);
Route::get('/v1/profile', [AuthController::class, 'profile'])->middleware('auth:api');

/**
 * /posts => get all =>  method: get
 * /posts => store new post method: post
 * /posts/{id} => get single post => method: get
 * /posts/{id} => update single post => method: put
 * /posts/{id} => delete single post => method: delete
 *
 *
 */
