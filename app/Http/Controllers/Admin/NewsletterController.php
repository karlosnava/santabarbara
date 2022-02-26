<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Directory;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Storage;

class NewsletterController extends Controller
{
    public function create(Directory $directory)
    {
        return view('admin.newsletters.create', compact('directory'));
    }

    public function store(Request $request, Directory $directory)
    {
        $request->validate([
            'name' => ['bail', 'required', 'string', 'min:3', 'max:30'],
            'slug' => ['bail', 'required', 'string', 'min:4', 'max:40', 'unique:newsletters,slug'],
            'file' => ['bail', 'required', 'file', 'max:4096']
        ]);

        $url = Storage::put('newsletters', $request->file('file'));
        $request['directory_id'] = $directory->id;
        $request['url'] = $url;
        $request['type'] = $request->file('file')->extension();
        $newsletter = Newsletter::create($request->all());

        return redirect()->route('admin.directories.show', $directory)->with('info', 'Archivo añadido correctamente.');
    }

    public function edit(Directory $directory, Newsletter $newsletter)
    {
        return view('admin.newsletters.edit', compact('directory', 'newsletter'));
    }

    public function update(Request $request, Directory $directory, Newsletter $newsletter)
    {
        $request->validate([
            'name' => ['bail', 'required', 'string', 'min:3', 'max:30'],
            'slug' => ['bail', 'required', 'string', 'min:4', 'max:40', 'unique:newsletters,slug'],
            'file' => ['bail', 'nullable', 'file', 'max:4096']
        ]);

        if ($request->file('file')) {
            if (Storage::delete($newsletter->url)) {
                $url = Storage::put('newsletters', $request->file('file'));
                $request['type'] = $request->file('file')->extension();
                $request['url'] = $url;
            }
        }

        $newsletter->update($request->all());
        return redirect()->route('admin.directories.show', $directory)->with('info', 'Archivo actualizado correctamente.');
    }

    public function destroy(Directory $directory, Newsletter $newsletter)
    {
        $newsletter->update(['status' => 'forgotten']);
        return redirect()->route('admin.directories.show', $directory)->with('info', 'Archivo quitado correctamente.');
    }
}
