@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    <h3>Comments</h3>
    <div class="list-group mb-3">
        @foreach($post->comments as $comment)
            <div class="list-group-item">
                <p>{{ $comment->content }}</p>
                <form action="{{ route('comments.destroy', $comment->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>
        @endforeach
    </div>

    <h4>Add a Comment</h4>
    <form action="{{ route('comments.store', $post->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Post Comment</button>
    </form>
</div>
@endsection
