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
        $posts = Post::where('status', '<>', 'forgotten')->orderBy('id', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $sedes = Location::pluck('name', 'id');
        return view('admin.posts.create', compact('sedes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => ['bail', 'required', 'string', 'min:5', 'max:50'],
            'slug'        => ['bail', 'required', 'string', 'min:5', 'max:100', "unique:posts,slug"],
            'extract'     => ['bail', 'required', 'min:10', 'max:200'],
            'description' => ['bail', 'required', 'min:10'],
            'status'      => ['bail', 'required', 'string', 'in:active,draft,forgotten'],
            'images'      => ['bail', 'required']
        ]);


        $requestData = $request->all();
        $requestData['user_id'] = auth()->user()->id;
        $post = Post::create($requestData);

        foreach ($request->file('images') as $image) {
            $url = Storage::put('posts', $image);
            $post->images()->create([
                'url' => $url,
                'size' => $image->getSize()
            ]);
        }

        return redirect()->route('admin.posts.show', $post)->with('info', 'Publicación creada correctamente.');
    }

    public function show(Post $post)
    {
        $post = Post::findOrFail($post->id);
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $post = Post::findOrFail($post->id);
        $sedes = Location::pluck('name', 'id');

        return view('admin.posts.edit', compact('post', 'sedes'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title'       => ['bail', 'required', 'string', 'min:5', 'max:50'],
            'slug'        => ['bail', 'required', 'string', 'min:5', 'max:100', "unique:posts,slug,$post->id"],
            'extract'     => ['bail', 'required', 'min:10', 'max:200'],
            'description' => ['bail', 'required', 'min:10'],
            'status'      => ['bail', 'required', 'string', 'in:active,draft,forgotten']
        ]);

        $post->update($request->all());
        return redirect()
            ->route('admin.posts.show', $post)
            ->with('info', 'El post ha sido actualizado correctamente.');
    }

    public function destroy(Post $post)
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
            ->route('admin.posts.index')
            ->with('info', 'Publicación eliminada correctamente.');
    }
}
