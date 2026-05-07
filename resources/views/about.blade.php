@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body p-5 text-center">
                    <div class="mb-4">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width:80px;height:80px;font-size:2rem;">
                            👨‍💻
                        </div>
                    </div>
                    <h1 class="fw-bold">About Me</h1>
                    <p class="lead text-muted">Laravel Developer & Blogger</p>
                    <hr>
                    <p class="text-muted lh-lg">
                        Welcome to MyBlog! I'm a passionate Laravel developer sharing 
                        my journey, tutorials, and thoughts about web development. 
                        This blog was built entirely with Laravel from scratch!
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card bg-light border-0 p-3">
                                <h4 class="fw-bold text-primary">Laravel</h4>
                                <small class="text-muted">Primary Framework</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light border-0 p-3">
                                <h4 class="fw-bold text-primary">PHP</h4>
                                <small class="text-muted">Primary Language</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card bg-light border-0 p-3">
                                <h4 class="fw-bold text-primary">MySQL</h4>
                                <small class="text-muted">Database</small>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="/posts" class="btn btn-primary me-2">Read My Posts</a>
                        <a href="/register" class="btn btn-outline-primary">Join MyBlog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection