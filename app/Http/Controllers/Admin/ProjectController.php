<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// MODELS
use App\Models\Project;
use App\Models\Image;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('status')->orderBy('created_at')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => ['bail', 'required', 'min:5', 'max:100'],
            'slug'        => ['bail', 'required', 'min:5', 'max:120', 'unique:projects,slug'],
            'description' => ['bail', 'required', 'min:5', 'max:30000'],
            'purpose'     => ['bail', 'sometimes', 'max:500'],
            'objectives'  => ['bail', 'sometimes', 'max:500'],
            'status'      => ['bail', 'required', 'min:5', 'max:500'],
            'cover'       => ['bail', 'required', 'image', 'max:2048'],
        ]);

        $requestData = $request->all();
        if ($request->file('cover')) {
            $url = Storage::put("projects/{$request->slug}", $request->file('cover'));
            $requestData["cover"] = $url;
        }

        $project = Project::create($requestData);
        return redirect()->route('admin.projects.show', $project)->with('info', 'Proyecto creado correctamente');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title'       => ['bail', 'required', 'min:5', 'max:100'],
            'slug'        => ['bail', 'required', 'min:5', 'max:120', "unique:projects,slug,{$project->id}"],
            'description' => ['bail', 'required', 'min:5', 'max:30000'],
            'purpose'     => ['bail', 'sometimes', 'max:500'],
            'objectives'  => ['bail', 'sometimes', 'max:500'],
            'status'      => ['bail', 'required', 'min:5', 'max:500'],
            'cover'       => ['bail', 'image', 'max:2048'],
        ]);

        $requestData = $request->all();
        if ($request->file('cover'))
        {
            if ($request->slug !== $project->slug) {
                Storage::deleteDirectory("projects/{$project->slug}");
            }

            if (Storage::delete($project->cover)) {
                $url = Storage::put("projects/{$request->slug}", $request->file('cover'));
                $requestData["cover"] = $url;
            }
        }

        $project->update($requestData);
        return redirect()->route('admin.projects.show', $project)->with('info', 'Proyecto editado correctamente');
    }

    public function destroy(Project $project)
    {
        if ($project->status == "inactive") {
            $project->update(['status' => 'active']);
            return redirect()->route('admin.projects.show', $project)->with('info', 'Proyecto activado nuevamente');
        } else {
            $project->update(['status' => 'inactive']);
            return redirect()->route('admin.projects.index')->with('info', 'Proyecto desactivado correctamente');
        }
    }
}
