<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// MODELS
use App\Models\Project;
use App\Models\Location;
use App\Models\Post;
use App\Models\Directory;

class ProjectController extends Controller
{
    public function index()
    {
        $limit = config('settings.limit_records');
        $pages = config('settings.page_records');

        $projects = Project::where('status', 'active')->orderBy('created_at', 'desc')->limit($limit)->paginate($pages);
        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $limit = config('settings.limit_records');
        $project->update(['views' => $project->views+1]);
        $projects = Project::where('status', 'active')->where('id', '<>', $project->id)->orderBy('created_at', 'desc')->limit($limit)->get();
        $posts = Post::where('status', 'active')->get();
        $directories = Directory::where('status', 'active')->limit($limit)->get();

        return view('projects.show', compact('project', 'projects', 'posts', 'directories'));
    }
}
