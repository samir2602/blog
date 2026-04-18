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
        <input type="text" name="title" value="{{ old('title') }}" />
    </div>
    <br>
    <div>
        <label>Body</label>
        <textarea name="body" rows="5">{{ old('body') }}</textarea>
    </div>
    <br>
    <div>
        <label>Categories</label><br>
        @foreach($categories as $category)
        <input type="checkbox" name="categories[]" value="{{ $category->id }}">{{ $category->name }} <br>
        @endforeach
    </div>
    <br>
    <button type="submit">Save Post</button>
</form>
@endsection