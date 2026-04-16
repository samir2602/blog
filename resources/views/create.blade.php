@extends('layouts.app')

@section('content')
<h1>Create a new post</h1>
@if($errors->any())
<div>
    @foreach($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
    @endforeach
</div>
@endif
<form method="post" action="/posts">
    @csrf
    <div>
        <label>Title</label>
        <input type="text" name="title" />
    </div>
    <br>
    <div>
        <label>Body</label>
        <textarea name="body" rows="5"></textarea>
    </div>
    <br>
    <button type="submit">Save Post</button>
</form>
@endsection