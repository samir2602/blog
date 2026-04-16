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
}
