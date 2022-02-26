<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Banner;
use App\Models\Admin\Newspaper;
use App\Models\Directory;

class HomeController extends Controller
{
    public function __invoke()
    {
        $limit = config('settings.limit_records');
        $pages = config('settings.page_records');

        $newsSedeA = Newspaper::where('location_id', 1)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->paginate($pages);

        $newsSedeB = Newspaper::where('location_id', 2)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->paginate($pages);

        $newsSedeC = Newspaper::where('location_id', 3)
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit($limit)
            ->paginate($pages);

        $posts = Post::where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->limit($limit)->get();

        $banners = Banner::where('status', 'active')
            ->orderBy('order', 'asc')
            ->limit($limit)->get();

        $directories = Directory::where('status', 'active')
            ->limit($limit)->get();


        return view('welcome', compact('newsSedeA', 'newsSedeB', 'newsSedeC', 'posts', 'banners', 'directories'));
    }
}
