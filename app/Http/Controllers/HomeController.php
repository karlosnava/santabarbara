<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Admin\Location;
use App\Models\Directory;

class HomeController extends Controller
{
    public function __invoke()
    {
        $limit = config('settings.limit_records');

        $banners = Banner::where('status', 'active')
            ->orderBy('order', 'asc')
            ->limit($limit)->get();

        $directories = Directory::where('status', 'active')
            ->limit($limit)->get();

        $locationA = Location::where('slug', 'sede-a')->first();
        $locationB = Location::where('slug', 'sede-b')->first();
        $locationC = Location::where('slug', 'sede-c')->first();
        $todas     = Location::where('slug', 'todas')->first();

        return view('welcome', compact('banners', 'directories', 'locationA', 'locationB', 'locationC', 'todas'));
    }
}
