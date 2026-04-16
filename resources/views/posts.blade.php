@extends('layouts.app')

@section('content')
    <h1>Blog Post</h1>
    @foreach($posts as $post)
    <div>
        <h1>{{ $post->title }}</h1>
        <h5>{{ $post->body }}</h5>
        <a href="/posts/{{ $post->id }}/edit">Edit</a>
        <form method="post" action="/posts/{{ $post->id }}">
            @csrf()
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
    @endforeach
@endsection