<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// MODELS
use App\Models\Admin\Location;
use App\Models\Admin\Post;

class LocationController extends Controller
{
    public function show(Location $location)
    {
        return view('admin.locations.show', compact('location'));
    }

    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $request->validate([
            'name'        => ['bail', 'required', 'min:4', 'max:30', 'string'],
            'description' => ['bail', 'required', 'min:4', 'string'],
            'direction'   => ['bail', 'required', 'min:4', 'string'],
            'phone'       => ['bail', 'required', 'min:4', 'string'],
            'opens'       => ['bail', 'required', 'min:4', 'max: 15', 'string'],
            'closes'      => ['bail', 'required', 'min:4', 'max: 15', 'string'],
            'file'        => ['nullable', 'file', 'max:4096', 'dimensions:min_width=1280,min_height=720']
        ]);

        if ($request->file('file')) {
            $url = Storage::put("images/{$location->slug}", $request->file('file'));
            $request['image'] = $url;
        }

        $location->update($request->all());
        return redirect()->route('admin.locations.show', $location)->with('info', 'Sede actualizada correctamente.');
    }
}
