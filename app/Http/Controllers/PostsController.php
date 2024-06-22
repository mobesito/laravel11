<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $post = Post::with(['user', 'comments', 'tags'])->latest()->paginate(10);
        return view('posts.index', [
            'posts' => $post
        ]);

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'content' => ['required', 'min:10']
        ]);

        Post::create([
            'user_id' => 1,
            'title' => request('title'),
            'post_content' =>request('content')
        ]);

        return redirect('/posts');
    }
}
