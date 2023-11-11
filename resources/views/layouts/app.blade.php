<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Forum</title>
    <!-- Add your stylesheets, scripts, or other meta tags here -->
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="{{ route('posts.index') }}">Home</a></li>
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>

    <main>
        <div>
            @yield('content')
        </div>
    </main>

    <footer>
        <!-- Your footer content goes here -->
    </footer>

    <!-- Add your scripts or other assets here -->

</body>
</html>
