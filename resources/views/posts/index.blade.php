@extends('layouts.app')

@section('content')
  <div class="container mt-5">
    <h1>All Posts</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
    <ul class="list-group">
      @foreach($posts as $post)
        <li class="list-group-item">
          <h5>{{ $post->title }}</h5>
          <p>{{ $post->content }}</p>
          <p><strong>By:</strong> {{ $post->user->name }}</p>
          <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
          <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
          </form>
          <a href="{{ route('posts.comments', $post->id) }}" class="btn btn-info btn-sm">Comments</a>
        </li>
      @endforeach
    </ul>
  </div>
@endsection
