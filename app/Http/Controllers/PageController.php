<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Events\PostSaved;

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
        $page = $request->page ?? 1;
        $cacheKey = 'posts_' . ($search ?? 'all') . '_page_' . $page;

        $posts = Cache::remember($cacheKey, 60, function() use ($search, $cacheKey){
            return Post::with('user', 'categories')
            ->when($search, function ($query) use ($search){
                $query->where('title', 'like', '%'.$search.'%');
            })->orderBy('id', 'desc')->simplePaginate(5);
        });
    
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

        PostSaved::dispatch($post);

        return redirect('/posts')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post){
        $this->authorize('update', $post);

        $categories = Category::all();
        return view('edit', ['post' => $post, 'categories' => $categories]);
    }

    public function update(Request $request, Post $post){
        $this->authorize('update', $post);

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

        PostSaved::dispatch($post);

        return redirect('/posts')->with('success', 'Post updated successfully!');
    }

    public function destory(Post $post){
        $this->authorize('delete', $post);
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted successfully!');
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

    public function home(){
        $posts = Post::with('user', 'categories')->latest()->take(6)->get();
        return view('home', ['posts' => $posts]);
    }

}
