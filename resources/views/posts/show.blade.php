@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card mt-4">
            <div class="card-body">
                <h1 class="card-title">{{ $post->title }}</h1>
                <p class="card-text">{{ $post->content }}</p>

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid mt-3">
                @endif

                <p class="mt-3">Created by: {{ $post->user->name }}</p>

                <div class="mt-4">
                    <!-- Like Button -->
                    <form method="POST" action="{{ route('posts.like', $post) }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success">Like</button>
                        <span class="ml-2">{{ $post->likes()->count() }} Likes</span>
                    </form>

                    <form method="POST" action="{{ route('posts.dislike', $post) }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-danger">Dislike</button>
                        <span class="ml-2">{{ $post->dislikes()->count() }} Dislikes</span>
                    </form>



                </div>
            </div>
        </div>

        <h2 class="mt-4 text-light">Comments</h2>

        @if($post->comments && $post->comments->count() > 0)
            @foreach($post->comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <p class="card-text"><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-light">No comments yet.</p>
        @endif

        @auth
            <!-- Comment Form -->
            <form method="POST" action="{{ route('comments.store', ['post' => $post]) }}" class="mt-4">
                @csrf
                <div class="form-group text-light">
                    <label for="comment">Add a Comment:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </form>
        @else
            <p class="mt-4 text-light">Login to leave a comment. <a href="{{ route('login') }}">Login</a></p>
        @endauth

        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-4 mb-5">Back to Posts</a>
    </div>
@endsection
