<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcome', function () {

    return view('welcome');
});


Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get("users/create", [UserController::class, 'create'])->name('users.create');
Route::post("users/store", [UserController::class, 'store'])->name('users.store');
Route::get("users/{id}/show", [UserController::class, 'show'])->name('users.show');
Route::get("users/{id}/edit", [UserController::class, 'edit'])->name('users.edit');
Route::put("users/{id}/update", [UserController::class, 'update'])->name('users.update');
Route::get("users/{id}/delete", [UserController::class, 'destroy']);


// Route::get('/posts', [PostController::class, 'index']);
// Route::post("/posts", [PostController::class, 'store']);
// Route::get('/posts/create', [PostController::class, 'create']);
// Route::get('/posts/{id}', [PostController::class, 'show']);
// Route::put("/posts/{id}", [PostController::class, 'update']);
// Route::delete("/posts/{id}", [PostController::class, 'destroy']);
// Route::get('/posts/{id}/edit', [PostController::class, 'edit']);


Route::resource('posts',PostController::class);
Route::get('/posts/{id}/delete', [PostController::class, 'destroy'])->name('deletePost');
// Route::resource('users',UserController::class);

// Route::get("/posts/{post}/edit", [PostController::class, 'edit']);
