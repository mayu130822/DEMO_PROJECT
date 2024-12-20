<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;

class ApiCommentController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments()->with('user')->get();
        return CommentResource::collection($comments);
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $comment = $post->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return new CommentResource($comment);
    }
}
