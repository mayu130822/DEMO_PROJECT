<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    // Display all posts
    public function index()
    {
        //$posts = Post::all();
        $userId = auth()->id();
        $posts = Post::where('user_id', $userId)->get();
        return view('posts.index', compact('posts'));
    }

    // Show the form to create a new post
    public function create()
    {
        return view('posts.create');
    }

    // Store a new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(), 
        ]);

        return redirect()->route('posts.index');
    }

    // Show a single post
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    // Show the form to edit a post
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    // Update a post
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    // Delete a post
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('posts.index');
    }

    // Fetch posts by a specific user
    public function getUserPosts($userId)
    {
        $posts = Post::where('user_id', $userId)->get();
        return view('posts.index', compact('posts'));
    }
}
