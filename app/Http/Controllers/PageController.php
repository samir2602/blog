<?php

namespace App\Http\Controllers;
use App\Models\Post;
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
        return view('create');
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:5',
            'body' => 'required|min:10',
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect('/posts');
    }
}
