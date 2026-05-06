@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h4 class="mb-0 fw-bold">✍️ Create New Post</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="/posts">
                        @csrf

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter post title..." value="{{ old('title') }}"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Body</label>
                            <textarea name="body" class="form-control" rows="8"placeholder="Write your post content here...">{{ old('body') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Categories</label>
                            <div class="d-flex flex-wrap gap-3">
                                @foreach($categories as $category)
                                    <div class="form-check">
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input" id="category_{{ $category->id }}">
                                        <label class="form-check-label" for="category_{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Publish Post</button>
                            <a href="/posts" class="btn btn-outline-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection