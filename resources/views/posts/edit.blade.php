@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>

    @if ($post->image && Storage::exists($post->image))
    <img src="{{ asset(Storage::url($post->image)) }}" alt="Current Post Image" class="img-fluid mb-3">
@endif


    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
        <!-- form fields -->
    
        @csrf
        @method('PUT')

        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $post->title }}" required>

        <label for="content">Content:</label>
        <textarea name="content" required>{{ $post->content }}</textarea>

        <label for="image">Image:</label>
        <input type="file" name="image">

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
@endsection
