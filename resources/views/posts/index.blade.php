<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h1>Posts</h1>

        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>

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

        <div class="container text-center pt-4">
            Welcome {{ auth()->user()->name }}
            <div class="mt-3">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <input type="submit" class="btn btn-danger" value="Logout">
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
