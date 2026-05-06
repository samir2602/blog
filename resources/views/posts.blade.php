@extends('layouts.app')

@section('content')
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="fw-bold">📝 Blog Posts</h1>
        </div>
        @auth
            <div class="col-md-4 text-end">
                <a href="/posts/create" class="btn btn-primary">+ New Post</a>
            </div>
        @endauth
    </div>

    <div class="row mb-4">
        <div class="col-md-6">
            <form method="GET" action="/posts">
                <div class="input-group">
                    <input 
                        type="text" 
                        name="search" 
                        class="form-control" 
                        placeholder="Search posts..." 
                        value="{{ $search }}"
                    />
                    <button type="submit" class="btn btn-outline-secondary">Search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @forelse($posts as $post)
            <div class="col-md-6 mb-4">
                <div class="card post-card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/posts/{{ $post->id }}" class="text-decoration-none text-dark">
                                {{ $post->title }}
                            </a>
                        </h5>
                        <p class="card-text text-muted">
                            {{ Str::limit($post->body, 100) }}
                        </p>
                        <div class="mb-2">
                            @foreach($post->categories as $category)
                                <span class="badge bg-primary category-badge me-1">{{ $category->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                        <small class="text-muted">
                            By <strong>{{ $post->user->name }}</strong>
                        </small>
                        @auth
                            @can('update', $post)
                                <div class="d-flex gap-2">
                                    <a href="/posts/{{ $post->id }}/edit" class="btn btn-sm btn-outline-secondary">Edit</a>
                                    <form method="POST" action="/posts/{{ $post->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                    </form>
                                </div>
                            @endcan
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No posts found! 
                    @auth
                        <a href="/posts/create">Create the first one!</a>
                    @endauth
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $posts->links() }}
    </div>
@endsection