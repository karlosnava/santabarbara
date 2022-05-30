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
        $pages = config('settings.page_records');

        $posts = Post::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit($limit)->get();

        $banners = Banner::where('status', 'active')
            ->orderBy('order', 'asc')
            ->limit($limit)->get();

        $directories = Directory::where('status', 'active')
            ->limit($limit)->get();

        $locationA = Location::where('slug', 'sede-a')->first();
        $locationB = Location::where('slug', 'sede-b')->first();
        $locationC = Location::where('slug', 'sede-c')->first();

        return view('welcome', compact('posts', 'banners', 'directories', 'locationA', 'locationB', 'locationC'));
    }
}
