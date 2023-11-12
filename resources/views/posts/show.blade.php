<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $post->title }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h1>{{ $post->title }}</h1>
        <p>{{ $post->content }}</p>

        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" class="img-fluid">
        @endif

        <p class="mt-2">Created by: {{ $post->user->name }}</p>

        <h2 class="mt-4">Comments</h2>

        @if($post->comments && $post->comments->count() > 0)
            @foreach($post->comments as $comment)
                <div class="card mb-2">
                    <div class="card-body">
                        <p class="card-text"><strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>No comments yet.</p>
        @endif

        @auth
            <!-- Comment Form -->
            <form method="POST" action="{{ route('comments.store', ['post' => $post]) }}" class="mt-4">
                @csrf
                <div class="form-group">
                    <label for="comment">Add a Comment:</label>
                    <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Comment</button>
            </form>
        @else
            <p class="mt-4">Login to leave a comment. <a href="{{ route('login') }}">Login</a></p>
        @endauth

        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-4">Back to Posts</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
