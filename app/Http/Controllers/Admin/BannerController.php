<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Storage;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::where('status', 'active')->orderBy('order')->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => ['bail', 'required', 'string', 'min:3', 'max:90'],
            'priority'    => ['bail', 'required', 'string', 'in:normal,highlight'],
            'description' => ['bail', 'required', 'string', 'min:3', 'max:90'],
            'text_url'    => ['bail', 'nullable', 'string', 'min:3', 'max:15', 'required_with:url'],
            'url'         => ['bail', 'nullable', 'string', 'url', 'min:10', 'required_with:text_url'],
            'media'       => ['bail', 'required', 'image', 'max:2048', 'dimensions:min_width=800,min_height=600']
        ]);

        $order = 1;
        $lastBanner = Banner::select('order')->orderBy('order', 'desc')->limit(1)->get();
        if ($lastBanner->first()) {
            if ($lastBanner->first()->order) {
                $order = $lastBanner->first()->order + 1;
            }
        }

        $url = Storage::put('banners', $request->file('media'));
        $request['image'] = $url;
        $request['order'] = $order;
        $banner = Banner::create($request->all());

        return redirect()->route('admin.banners.show', $banner)->with('info', 'Banner creado correctamente.');
    }

    public function show(Banner $banner)
    {
        return view('admin.banners.show', compact('banner'));
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'title'       => ['bail', 'required', 'string', 'min:3', 'max:90'],
            'priority'    => ['bail', 'required', 'string', 'in:normal,highlight'],
            'description' => ['bail', 'required', 'string', 'min:3', 'max:90'],
            'text_url'    => ['bail', 'nullable', 'string', 'min:3', 'max:15', 'required_with:url'],
            'url'         => ['bail', 'nullable', 'string', 'min:10', 'url', 'required_with:text_url'],
            'media'       => ['bail', 'nullable', 'image', 'max:2048', 'dimensions:min_width=800,min_height=600']
        ]);

        if ($request->file('media')) {
            if (Storage::delete($banner->image)) {
                $url = Storage::put('banners', $request->file('media'));
                $request['image'] = $url;
            } else {
                throw ValidationException::withMessages([
                    'media' => "Error al intentar eliminar la anterior imagen."
                ]);
            }
        }

        $banner->update($request->all());

        return redirect()->route('admin.banners.show', compact('banner'))->with('info', 'Banner actualziado correctamente,');
    }

    public function destroy(Banner $banner)
    {
        $banner->update(['status' => 'forgotten']);
        return redirect()->route('admin.banners.index')->with('info', 'Banner eliminado correctamente.');
    }
}
