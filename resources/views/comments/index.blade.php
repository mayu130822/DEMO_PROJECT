@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Post Details -->
    <div class="card mb-4">
        <div class="card-body">
            <h2 class="card-title">{{ $post->title }}</h2>
            <p class="card-text">{{ $post->content }}</p>
            <small class="text-muted">Posted on {{ $post->created_at->format('d M Y, H:i') }}</small>
        </div>
    </div>

    <!-- Comments Section -->
    <h3>Comments ({{ $comments->count() }})</h3>
    @if ($comments->isEmpty())
        <p class="text-muted">No comments yet. Be the first to comment!</p>
    @else
        <div class="list-group mb-4">
            @foreach ($comments as $comment)
                <div class="list-group-item">
                    <strong>{{ $comment->user->name ?? 'Anonymous' }}</strong>
                    <p>{{ $comment->content }}</p>
                    <small class="text-muted">Posted on {{ $comment->created_at->format('d M Y, H:i') }}</small>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Add Comment Form -->
    <h4>Add a Comment</h4>
    <form action="{{ route('posts.comments.store', $post) }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <textarea name="content" class="form-control" rows="4" placeholder="Write your comment..." required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
