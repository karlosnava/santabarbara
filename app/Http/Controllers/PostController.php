<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// MODELS
use App\Models\Post;
use App\Models\Project;
use App\Models\Location;
use App\Models\Directory;

class PostController extends Controller
{
    public function show(Post $post)
    {
        $limit = config('settings.limit_records');
        $post->update(['views' => $post->views+1]);
        $posts = Post::where('status', 'active')->where('id', '<>', $post->id)->limit($limit)->get();
        $projects = Project::where('status', 'active')->limit($limit)->get();
        $directories = Directory::where('status', 'active')->limit($limit)->get();

        return view('posts.show', compact('post', 'posts', 'projects', 'directories'));
    }
}
