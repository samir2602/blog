@extends('layouts.app')

@section('content')
    <h1>Blog Post</h1>
    @foreach($posts as $post)
    <div>
        <h1>{{ $post->title }}</h1>
        <h5>{{ $post->body }}</h5>
    </div>
    @endforeach
@endsection