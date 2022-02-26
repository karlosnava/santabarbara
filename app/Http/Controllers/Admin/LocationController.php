<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Location;
use App\Models\Admin\Newspaper;
use App\Models\Admin\Podcast;
use App\Models\Admin\Gallery;

class LocationController extends Controller
{
    public function index()
    {
        $sedes = Location::where('id', '<>', 4)->get();
        return view('admin.locations.index', compact('sedes'));
    }

    public function show(Location $location)
    {
        $news = Newspaper::where('location_id', $location->id)
            ->where('status', 'active')
            ->limit(50)->get();
        return view('admin.locations.show', compact('location', 'news'));
    }

    public function edit(Location $sede)
    {
        //
    }

    public function update(Request $request, Location $sede)
    {
        //
    }
}
