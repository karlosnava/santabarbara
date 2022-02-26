<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Admin\Newspaper;

class NewspaperController extends Controller
{
    public function create(Request $request)
    {
        $location_id = $request->location_id;
        return view('admin.news.create', compact('location_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'location_id' => ['bail', 'required', 'numeric', 'min:1', 'max:3', 'in:1,2,3'],
            'title'       => ['bail', 'required', 'string', 'min:5', 'max:255'],
            'slug'        => ['bail', 'required', 'string', 'min:5', 'max:300', 'unique:newspapers,slug'],
            'description' => ['bail', 'required', 'string', 'min:5'],
            'status'      => ['bail', 'required', 'string', 'min:5', 'in:active,draft'],
            'media'       => ['bail', 'required', 'image', 'max:2048', 'dimensions:min_width=800,min_height=600']
        ]);

        $url = Storage::put('news', $request->file('media'));
        $request['user_id'] = auth()->user()->id;
        $request['image'] = $url;
        $new = Newspaper::create($request->all());

        return redirect()->route('admin.newspapers.show', $new)->with('info', 'Noticia publicada correctamente.');
    }

    public function show(Newspaper $newspaper)
    {
        return view('admin.news.show', compact('newspaper'));
    }

    public function edit(Request $request, Newspaper $newspaper)
    {
        $location_id = $request->location_id;
        return view('admin.news.edit', compact('newspaper', 'location_id'));
    }

    public function update(Request $request, Newspaper $newspaper)
    {
        $request->validate([
            'location_id' => ['bail', 'required', 'numeric', 'min:1', 'max:3', 'in:1,2,3'],
            'title'       => ['bail', 'required', 'string', 'min:5', 'max:255'],
            'slug'        => ['bail', 'required', 'string', 'min:5', 'max:300', "unique:newspapers,slug,$newspaper->id"],
            'description' => ['bail', 'required', 'string', 'min:5'],
            'status'      => ['bail', 'required', 'string', 'min:5', 'in:active,draft'],
            'media'       => ['bail', 'image', 'max:2048', 'dimensions:min_width=800,min_height=600']
        ]);

        if ($request->media) {
            if (Storage::delete($newspaper->image)) {
                $url = Storage::put('news', $request->file('media'));
                $request['image'] = $url;
            }
        }

        $newspaper->update($request->all());

        return redirect()->route('admin.newspapers.show', $newspaper)
            ->with('info', 'La noticia ha sido actualizada correctamente.');
    }

    public function destroy(Newspaper $newspaper)
    {
        $newspaper->update([
            'status' => 'forgotten'
        ]);

        return redirect()
            ->route('admin.locations.show', $newspaper->location->slug)
            ->with('info', 'Noticia eliminada correctamente.');
    }
}
