<!-- resources/views/posts/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>

    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $post->title }}" required>

        <label for="content">Content:</label>
        <textarea name="content" required>{{ $post->content }}</textarea>

        <label for="image">Image:</label>
        <input type="file" name="image">

        <button type="submit">Update Post</button>
    </form>
@endsection
