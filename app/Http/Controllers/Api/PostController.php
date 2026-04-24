<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function index(){
        $posts = Post::with('user', 'categories')->paginate(5);
        return PostResource::collection($posts);
    }

    public function show(Post $post){
        $post->load('user', 'categories', 'comments');
        return PostResource($post);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        return response()->json($post, 201);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10',
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return response()->json($post);
    }

    public function destory(Post $post){
        $post->delete();
        return response()->json(['message' => 'Post Deleted successfully']);
    }
}
