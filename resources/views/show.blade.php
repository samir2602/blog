@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <small>Writtern By {{ $post->user->name }}</small>
    <br>
    <small>
        Categories:
        @foreach($post->categories as $category)
            <span>{{ $category->name }}</span>
        @endforeach
    </small>
    <hr>
    <p>{{ $post->body }}</p>
    <br>
    <a href="/posts">Back To posts</a>

    <hr>
    <h2>Comments ({{ $post->comments->count() }})</h2>
    @foreach($post->comments as $comment)
        <div>
            <strong>{{ $comment->user->name }}</strong>
            <p>{{ $comment->body }}</p>
            <small>{{ $comment->created_at->diffForHumans() }}</small>
            <hr>
        </div>
    @endforeach

    @auth
        <h3>Leave a Comment</h3>
        <form method="POST" action="/posts/{{$post->id}}/comments">
            @csrf
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <p style="color:red;">{{ $error}}</p>
                @endforeach
            @endif
            <textarea name="body" rows="5" placeholder="Your comment here..."></textarea>
            <br><br>
            <button type="submit">Submit Comment</button>
        </form>
    @else
        <p><a href="/login">Login</a> to leave a comment.</p>
    @endauth
@endsection