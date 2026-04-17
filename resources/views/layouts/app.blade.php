<!DOCTYPE html>
<html>
<head>
    <title>My Blog</title>
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
</html>