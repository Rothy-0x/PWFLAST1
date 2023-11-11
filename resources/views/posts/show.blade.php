<!-- resources/views/posts/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->content }}</p>

    @if ($post->image)
        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image">
    @endif

    <p>Created by: {{ $post->user->name }}</p>

    <h2>Comments</h2>

    @if($post->comments && $post->comments->count() > 0)
        @foreach($post->comments as $comment)
            <p><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
        @endforeach
    @else
        <p>No comments yet.</p>
    @endif

    @auth
        <!-- Comment Form -->
        <form method="POST" action="{{ route('comments.store', ['post' => $post]) }}">
            @csrf
            <div class="form-group">
                <label for="comment">Add a Comment:</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </form>
    @else
        <p>Login to leave a comment. <a href="{{ route('login') }}">Login</a></p>
    @endauth

    <a href="{{ route('posts.index') }}">Back to Posts</a>
@endsection
