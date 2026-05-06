@extends('layouts.app')

@section('content')
    {{-- Hero Section --}}
    <div class="p-5 mb-4 bg-dark text-white rounded-3 text-center">
        <h1 class="fw-bold display-5">Welcome to MyBlog ✍️</h1>
        <p class="lead">Thoughts, tutorials and stories about Laravel & PHP</p>
        @guest
            <a href="/register" class="btn btn-primary btn-lg me-2">Get Started</a>
            <a href="/posts" class="btn btn-outline-light btn-lg">Read Posts</a>
        @endguest
        @auth
            <a href="/posts/create" class="btn btn-primary btn-lg me-2">Write a Post</a>
            <a href="/posts" class="btn btn-outline-light btn-lg">Read Posts</a>
        @endauth
    </div>

    {{-- Latest Posts --}}
    <h3 class="fw-bold mb-4">🔥 Latest Posts</h3>

    <div class="row">
        @forelse($posts as $post)
            <div class="col-md-4 mb-4">
                <div class="card post-card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/posts/{{ $post->id }}" class="text-decoration-none text-dark">{{ $post->title }}</a>
                        </h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($post->body, 80) }}
                        </p>
                        <div>
                            @foreach($post->categories as $category)
                                <span class="badge bg-primary category-badge me-1">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer bg-white">
                        <small class="text-muted">
                            By <strong>{{ $post->user->name }}</strong> · 
                            {{ $post->created_at->diffForHumans() }}
                        </small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    No posts yet! <a href="/posts/create">Be the first to write one!</a>
                </div>
            </div>
        @endforelse
    </div>

     @if($posts->count() >= 6)
        <div class="text-center mt-3">
            <a href="/posts" class="btn btn-outline-primary">View All Posts →</a>
        </div>
    @endif
    
@endsection