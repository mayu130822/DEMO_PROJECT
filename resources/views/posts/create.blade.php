@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create New Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea name="content" id="content" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Create Post</button>
    </form>
</div>
@endsection
