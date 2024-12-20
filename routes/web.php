<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Auth::routes();


Route::middleware('auth')->group(function () {
    
    Route::get('/', [PostController::class, 'index'])->name('posts.index');
   
    Route::get('profile', [ProfileController::class, 'edit'])->name('profile');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // Route to fetch all posts by a specific user
    Route::get('user/{userId}/posts', [PostController::class, 'getUserPosts'])->name('posts.user');

    // Routes for Comments on a Post
    Route::post('posts/{postId}/comments', [CommentController::class, 'store'])->name('posts.comments.store');
    Route::delete('comments/{commentId}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::resource('posts', PostController::class);

    // Fetch all posts by a specific user
    Route::get('user/{userId}/posts', [PostController::class, 'userPosts'])->name('user.posts');

    // Fetch all comments on a specific post
    Route::get('post/{postId}/comments', [CommentController::class, 'getPostComments'])->name('posts.comments');

    Route::get('posts/{post}/comments', [CommentController::class, 'index'])->name('posts.comments.index');

    // Route to display the edit form (GET)
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

    // Route to handle the form submission for update (PUT or PATCH)
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

});

