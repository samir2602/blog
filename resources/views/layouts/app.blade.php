{{-- <!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav>
        <a href="/">Home</a> |
        <a href="/posts">Posts</a> |
        <a href="/posts/create">New Post</a> |
        <a href="/hello">Hello</a> |
        <a href="/about">About</a> |

        @auth
            <form method="POST" action="/logout">
                @csrf
                <button type="submit">Logout</button>
            </form>
        @endauth

        @guest
            <a href="/login">Login</a> |
            <a href="/register">Register</a>
        @endguest
    </nav>

    <hr>

    @yield('content')

</body>
</html> --}}
<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding: 20px; }
        nav { margin-bottom: 20px; }
        nav a { margin-right: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light px-3 mb-4 rounded">
            <a class="navbar-brand" href="/">MyBlog</a>
            <div class="d-flex gap-3">
                <a href="/posts">Posts</a>
                <a href="/posts/create">New Post</a>
                <a href="/about">About</a>

                @auth
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Logout</button>
                    </form>
                @endauth

                @guest
                    <a href="/login">Login</a>
                    <a href="/register">Register</a>
                @endguest
            </div>
        </nav>

        @yield('content')
    </div>
</body>
</html>