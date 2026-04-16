@extends('layouts.app')

@section('content')
<h1>Edit post</h1>
@if($errors->any())
<div>
    @foreach($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
    @endforeach
</div>
@endif
<form method="post" action="/posts/{{$post->id}}">
    @csrf
    @method('PUT')
    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ $post->title }}"/>
    </div>
    <br>
    <div>
        <label>Body</label>
        <textarea name="body" rows="5">{{ $post->body }}</textarea>
    </div>
    <br>
    <button type="submit">Update Post</button>
</form>
@endsection