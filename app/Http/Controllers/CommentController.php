<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class CommentController extends Controller
{
    // Fetch comments for a specific post
    public function getPostComments($postId)
    {
        $post = Post::findOrFail($postId);
        $comments = $post->comments;
        return view('comments.index', compact('comments', 'post'));
    }

    // Store a new comment on a post
    public function store(Request $request, $postId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $post = Post::findOrFail($postId);
        $post->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(), // Assuming you have authenticated users
        ]);

        return redirect()->route('posts.comments', $postId);
    }

    // Delete a comment
    public function destroy($commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $comment->delete();

        return back();
    }
}
