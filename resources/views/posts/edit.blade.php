@extends('layouts.app')

@section('content')
    <div class="container mt-4 mb-5">
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Edit Post</h1>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

//<<<<<<< main
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}" required>
                </div>
//=======
    @if ($post->image && Storage::exists($post->image))
    <img src="{{ asset(Storage::url($post->image)) }}" alt="Current Post Image" class="img-fluid mb-3">
@endif


    <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
        <!-- form fields -->
    
        @csrf
        @method('PUT')
//>>>>>>> main

                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea class="form-control" id="content" name="content" required>{{ $post->content }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-form">Update Post</button>

            </form>
        </div>
    </div>
</div>

//<<<<<<< main
//=======
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
//>>>>>>> main
@endsection
