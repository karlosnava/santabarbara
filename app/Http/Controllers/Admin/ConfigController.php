<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Admin\Config;

class ConfigController extends Controller
{
    public function index()
    {
        $configs = Config::all();
        return view('admin.configs.index', compact('configs'));
    }

    public function edit(Config $config)
    {
        return view('admin.configs.edit', compact('configs'));
    }

    public function update(Request $request, Config $config)
    {
        $request->validate([
            'value' => ['bail', 'sometimes', 'required', 'min:1', 'max:500'],
            'image' => ['bail', 'sometimes', 'required', 'image', 'dimensions:min_width=100,min_height=100', 'max:1024'],
        ]);

        $requestData = $request->all();
        if ($request->file('image')) {
            if (Storage::delete($config->value)) {
                $url = Storage::put('images', $request->file('image'));
                $requestData['value'] = $url;
            }
        }

        $config->update($requestData);
        return redirect()->route('admin.configs.index')->with('info', 'Configuración actualizada.');
    }
}
