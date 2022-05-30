<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

use App\Models\Post;
use App\Models\Image;
use App\Models\Admin\Location;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::where('status', '<>', 'forgotten')->orderBy('id', 'desc')->paginate(10);
        // return view('admin.posts.index', compact('posts'));
    }

    public function create(Location $location)
    {
        $sedes = Location::pluck('name', 'id');
        return view('admin.posts.create', compact('sedes', 'location'));
    }

    public function store(Request $request, Location $location)
    {
        $request->validate([
            'title'       => ['bail', 'required', 'string', 'min:5', 'max:50'],
            'slug'        => ['bail', 'required', 'string', 'min:5', 'max:100', "unique:posts,slug"],
            'extract'     => ['bail', 'required', 'min:10'],
            'description' => ['bail', 'required', 'min:10'],
            'status'      => ['bail', 'required', 'string', 'in:active,draft,forgotten'],
            'images'      => ['bail', 'required']
        ]);

        $requestData = $request->all();
        $requestData['user_id'] = auth()->user()->id;
        $requestData['location_id'] = $location->id;
        $post = Post::create($requestData);

        foreach ($request->file('images') as $image) {
            $url = Storage::put('posts', $image);
            $post->images()->create([
                'url' => $url,
                'size' => $image->getSize()
            ]);
        }

        return redirect()->route('admin.posts.show', [$location, $post])->with('info', 'Publicación creada correctamente.');
    }

    public function show(Location $location, Post $post)
    {
        $post = Post::findOrFail($post->id);
        return view('admin.posts.show', compact('location', 'post'));
    }

    public function edit(Location $location , Post $post)
    {
        $post = Post::findOrFail($post->id);
        return view('admin.posts.edit', compact('location', 'post'));
    }

    public function update(Request $request, Location $location, Post $post)
    {
        $request->validate([
            'title'       => ['bail', 'required', 'string', 'min:5', 'max:50'],
            'slug'        => ['bail', 'required', 'string', 'min:5', 'max:100', "unique:posts,slug,$post->id"],
            'extract'     => ['bail', 'required', 'min:10'],
            'description' => ['bail', 'required', 'min:10'],
            'status'      => ['bail', 'required', 'string', 'in:active,draft,forgotten']
        ]);

        $post->update($request->all());
        return redirect()
            ->route('admin.posts.show', [$location, $post])
            ->with('info', 'El post ha sido actualizado correctamente.');
    }

    public function destroy(Location $location, Post $post)
    {
        /* foreach ($post->images as $image) {
            Storage::delete($image->url);
        }

        $post->images()->delete();
        $post->delete(); */

        $post->update([
            'status' => 'forgotten'
        ]);

        return redirect()
            ->route('admin.locations.show', $location)
            ->with('info', 'Publicación eliminada correctamente.');
    }
}
