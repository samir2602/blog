@extends('layouts.app')

@section('content')
    <h1>Blog Post</h1>
    @foreach($posts as $post)
    <div>
        <h1>{{ $post->title }}</h1>
        <h5>{{ $post->body }}</h5>
        <small>Written by: {{ $post->user->name }}</small>
        <br>
        <small>Categories:
            @foreach($post->categories as $category)
                {{ $category->name }}
            @endforeach
        </small>
        @auth
        @if(auth()->id() === $post->user->id)
        <br><br>
        <a href="/posts/{{ $post->id }}/edit">Edit</a>
        <form method="post" action="/posts/{{ $post->id }}">
            @csrf()
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        @endif
        @endauth
    </div>
    @endforeach
@endsection