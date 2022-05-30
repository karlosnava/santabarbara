<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Directory;
use App\Models\Newsletter;

class DirectoryController extends Controller
{
    public function index()
    {
        $directories = Directory::orderBy('status')->orderBy('created_at')->get();
        return view('admin.directories.index', compact('directories'));
    }

    public function create()
    {
        return view('admin.directories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'slug' => ['required', 'string', 'min:3', 'max:50', 'unique:directories,slug']
        ]);

        $directory = Directory::create($request->all());
        return redirect()->route('admin.directories.show', $directory)->with('info', 'Directorio creado correctamente.');
    }

    public function show(Directory $directory)
    {
        return view('admin.directories.show', compact('directory'));
    }

    public function edit(Directory $directory)
    {
        return view('admin.directories.edit', compact('directory'));
    }

    public function update(Request $request, Directory $directory)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'slug' => ['required', 'string', 'min:3', 'max:50', "unique:directories,slug,{$directory->id}"]
        ]);

        $directory->update($request->all());
        return redirect()->route('admin.directories.show', $directory)->with('info', 'Directorio editado correctamente.');
    }

    public function destroy(Directory $directory)
    {
        $directory->update(['status' => 'forgotten']);
        return redirect()->route('admin.directories.index')->with('info', 'Directorio eliminado correctamente.');
    }

    public function reactivate(Request $request, Directory $directory)
    {
        $directory->update(['status' => 'active']);
        return redirect()->route('admin.directories.show', $directory)->with('info', 'Directorio reactivado correctamente.');
    }
}
