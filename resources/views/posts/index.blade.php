<!-- resources/views/posts/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Posts</h1>

    <a href="{{ route('posts.create') }}">Create Post</a>

    @foreach ($posts as $post)
    <div>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->content }}</p>
        @if ($post->image)
            <img src="{{ Storage::url($post->image) }}" alt="Post Image">
        @endif
        <p>Created by: {{ $post->user->name }}</p>
        <a href="{{ route('posts.show', $post) }}">View</a>

        @if(auth()->user()->id === $post->user_id)
            <a href="{{ route('posts.edit', $post) }}">Edit</a>
            
            <form method="POST" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endif
    </div>
@endforeach

    <div class="container text-center pt-4">
        Selamat Datang {{ auth()->user()->name }}
        <div class="div">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <input type="submit" class="btn btn-danger" value="Logout">
            </form>
        </div>
    </div>
@endsection

