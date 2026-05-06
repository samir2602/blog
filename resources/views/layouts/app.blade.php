<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBlog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
        <a class="navbar-brand fw-bold" href="/">✍️ MyBlog</a>
        <div class="navbar-nav ms-auto d-flex flex-row gap-3 align-items-center">
            <a class="nav-link text-white" href="/posts">Posts</a>
            <a class="nav-link text-white" href="/about">About</a>

            @auth
                <a class="btn btn-primary btn-sm" href="/posts/create">New Post</a>
                <form method="POST" action="/logout" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            @endauth

            @guest
                <a class="nav-link text-white" href="/login">Login</a>
                <a class="btn btn-primary btn-sm" href="/register">Register</a>
            @endguest
        </div>
    </nav>

    <div class="container py-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                ✅ {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                ❌ {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @yield('content')
    </div>

    <footer class="text-center py-4 mt-5 border-top text-muted">
        <small>MyBlog &copy; {{ date('Y') }} — Built with Laravel ❤️</small>
    </footer>
</body>
</html>