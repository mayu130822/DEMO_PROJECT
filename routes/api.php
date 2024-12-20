<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
//Route::middleware('auth:sanctum')->post('logout', [AuthenticatedSessionController::class, 'destroy']);


Route::middleware('api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    // Post Routes
    Route::apiResource('posts', PostController::class);
    Route::get('posts', [PostController::class, 'index'])->name('posts.comments');

    // Comment Routes
   // Route::apiResource('posts.comments', CommentController::class);

     // Comments on a post
     Route::get('posts/{post}/comments', [CommentController::class, 'index'])->name('posts.comments');
     Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('posts.comments.store');
});
