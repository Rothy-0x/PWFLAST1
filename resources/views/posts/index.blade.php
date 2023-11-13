@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        @if(auth()->check())
            <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
        @endif
        @foreach ($posts as $post)
            <div class="card mt-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $post->title }}</h2>
                    <p class="card-text">{{ $post->content }}</p>
                    @if ($post->image)
                        <img src="{{ Storage::url($post->image) }}" alt="Post Image" class="img-fluid">
                    @endif
                    <p class="card-text">Created by: {{ $post->user->name }}</p>
                    <a href="{{ route('posts.show', $post) }}" class="btn btn-info">View</a>

                    @if(auth()->user()->id === $post->user_id)
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning">Edit</a>

                        <form method="POST" action="{{ route('posts.destroy', $post) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
