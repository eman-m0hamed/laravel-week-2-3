<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {

    return view('welcome');
});


Route::get('/users', [UserController::class, 'index']);
Route::get("users/create", [UserController::class, 'create']);
Route::post("users/store", [UserController::class, 'store']);
Route::get("users/{id}/show", [UserController::class, 'show']);
Route::get("users/{id}/edit", [UserController::class, 'edit']);
Route::put("users/{id}/update", [UserController::class, 'update']);
Route::get("users/{id}/delete", [UserController::class, 'destroy']);
