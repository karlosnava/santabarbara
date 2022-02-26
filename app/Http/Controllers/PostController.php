<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $post->update(['views' => $post->views+1]);
        return view('posts.show', compact('post'));
    }
}
