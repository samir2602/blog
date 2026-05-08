@extends('layouts.app')

@section('title', $post->title . ' - MyBlog')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Post Card --}}
            <div class="card shadow-sm mb-4">
                <div class="card-body p-4">
                    <h1 class="fw-bold mb-2">{{ $post->title }}</h1>

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <small class="text-muted">✍️ By <strong>{{ $post->user->name }}</strong></small>
                        <small class="text-muted">🕒 {{ $post->created_at->diffForHumans() }}</small>
                    </div>

                    <div class="mb-3">
                        @foreach($post->categories as $category)
                            <span class="badge bg-primary me-1">{{ $category->name }}</span>
                        @endforeach
                    </div>
                    <hr>
                    <p class="card-text lh-lg">{{ $post->body }}</p>
                    <hr>
                    
                    <div class="d-flex gap-2">
                        <a href="/posts" class="btn btn-outline-secondary btn-sm">← Back to Posts</a>
                        @can('update', $post)
                            <a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-primary btn-sm">Edit Post</a>
                            <form method="POST" action="/posts/{{ $post->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Delete Post</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>

            {{-- Comments Section --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold">💬 Comments ({{ $post->comments->count() }})</h5>
                </div>
                <div class="card-body">
                    @forelse($post->comments as $comment)
                        <div class="d-flex gap-3 mb-3">
                            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width:40px;height:40px;min-width:40px;">
                                {{ strtoupper(substr($comment->user->name, 0, 1)) }}
                            </div>
                            <div>
                                <strong>{{ $comment->user->name }}</strong>
                                <small class="text-muted ms-2">{{ $comment->created_at->diffForHumans() }}</small>
                                <p class="mb-0 mt-1">{{ $comment->body }}</p>
                            </div>
                        </div>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @empty
                        <p class="text-muted mb-0">No comments yet — be the first!</p>
                    @endforelse
                </div>
            </div>

            {{-- Comment Form --}}
            @auth
                <div class="card shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0 fw-bold">Leave a Comment</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/posts/{{ $post->id }}/comments">
                            @csrf

                            @if($errors->any())
                                <div class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <p class="mb-0">{{ $error }}</p>
                                    @endforeach
                                </div>
                            @endif

                            <div class="mb-3">
                                <textarea name="body" class="form-control" rows="3" placeholder="Write your comment..."></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Post Comment</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="alert alert-info">
                    <a href="/login">Login</a> to leave a comment!
                </div>
            @endauth
        </div>
    </div>
@endsection