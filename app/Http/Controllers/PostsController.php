<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        if($post->isPublished() || auth()->check()){
            return view('posts.show', compact('post'));
        }
        abort(404);
    }
}
