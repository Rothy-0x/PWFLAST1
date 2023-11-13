<nav class="navbar navbar-expand-lg navbar-dark  shadow">
            <a class="navbar-brand" href="#"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-light " href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light " href="{{ route('posts.index') }}">Posts</a>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link btn btn-login text-light " href="{{ route('login') }}">Login</a>
                        </li>
                        @endguest @auth
                        <li class="nav-item">
                            <span class="nav-link">Welcome {{ auth()->user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <input type="submit" class="btn btn-outline-danger" value="Logout" />
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>
