<html>
<head>
    <title>App Layout</title>
</head>
<body>
    <nav>
        <a href="/">Home</a>
        <a href="/post">Post</a>
        <a href="/about">About</a>
    </nav>
    <h1>Welcome to My Laravel App</h1>
    <p>This is the main layout for my application.</p>

    @yield('content')
</body>
</html>