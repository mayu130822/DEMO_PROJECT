<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiPostController;
use App\Http\Controllers\ApiCommentController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
//Route::middleware('auth:sanctum')->post('logout', [AuthenticatedSessionController::class, 'destroy']);


Route::middleware('api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    // Post Routes
    Route::apiResource('posts', ApiPostController::class);
    Route::get('posts', [ApiPostController::class, 'index'])->name('posts.comments');

    // Comment Routes
    Route::apiResource('posts.comments', ApiCommentController::class);

     // Comments on a post
     Route::get('posts/{post}/comments', [ApiCommentController::class, 'index'])->name('posts.comments');
     Route::post('posts/{post}/comments', [ApiCommentController::class, 'store'])->name('posts.comments.store');

    Route::get('/posts', [ApiPostController::class, 'index']); // List all posts
    Route::get('/posts/{id}', [ApiPostController::class, 'show']); // Get a single post
    Route::post('/posts', [ApiPostController::class, 'store']); // Create a post
    Route::put('/posts/{id}', [ApiPostController::class, 'update']); // Update a post
    Route::delete('/posts/{id}', [ApiPostController::class, 'destroy']); // Delete a post

});
