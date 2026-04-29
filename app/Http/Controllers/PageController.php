<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
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

    public function post(Request $request){
        $search = $request->search;        
        $posts = Post::with('user', 'categories')->when($search, function ($query) use ($search){
            $query->where('title', 'like', '%'.$search.'%');
        })->simplePaginate(5);        
        return view('posts', ['posts' => $posts, 'search' => $search]);
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
        $categories = Category::all();
        return view('edit', ['post' => $post, 'categories' => $categories]);
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

        if($request->categories){
            $post->categories()->sync($request->categories);
        }else{
            $post->categories()->detach();
        }

        return redirect('/posts');
    }

    public function destory(Post $post){
        $post->delete();
        return redirect('/posts');
    }

    public function show(Post $post){
        return view('show', ['post' => $post]);
    }

    public function comment(Request $request, Post $post){
        $request->validate([
            'body' => 'required|min:5',
        ]);

        Comment::create([
            'body' => $request->body,
            'post_id' => $post->id,
            'user_id' => auth()->id(),
        ]);

        return redirect('/posts/'.$post->id);
    }

}
