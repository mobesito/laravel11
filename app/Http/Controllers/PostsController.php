<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
        $post = Post::with(['user', 'comments', 'tags'])->latest()->paginate(10);

        return view('posts.index', [
            'posts' => $post
        ]);
    }
}
