<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function hello()
    {
        $user = "samir";
        return view('hello', ['user' => $user]);
    }

    public function about()
    {
        return view('about');
    }

    public function post(){
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', ['categories' => $categories]);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:10',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(),
        ]);

        if($request->categories){
            $post->categories()->attach($request->categories);
        }

        return redirect('/posts');
    }

    public function edit(Post $post){
        return view('edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:10',
        ]);

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect('/posts');
    }

    public function destory(Post $post){
        $post->delete();
        return redirect('/posts');
    }
}
