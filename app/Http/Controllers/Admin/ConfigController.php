<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $request->valdiate([
            'app_name'         => ['bail', 'required', 'min:3', 'string', 'max:90'],
            'site_description' => ['bail', 'required', 'min:3', 'string', 'max:500'],
            'theme'            => ['bail', 'required', 'min:3', 'string', 'max:90'],
            'category'         => ['bail', 'required', 'min:3', 'string', 'max:90'],
            'keywords'         => ['bail', 'required', 'min:3', 'string', 'max:90'],
            'page_icon'        => ['bail', 'required', 'min:3', 'string', 'max:90'],
            'page_records'     => ['bail', 'required', 'min:3', 'number', 'max:90'],
            'limit_records'    => ['bail', 'required', 'min:3', 'number', 'max:90'],
            'site_topic'       => ['bail', 'required', 'min:3', 'string', 'max:90'],
            'site_details'     => ['bail', 'required', 'min:3', 'string', 'max:500']
        ]);

        $config->update($request->all());

        return redirect()->route('admin.configs.index')->with('info', 'Configuración actualizada.');
    }
}
