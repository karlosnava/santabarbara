<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin\Newspaper;

class NewspaperController extends Controller
{
    public function show(Newspaper $newspaper)
    {
        $newspaper->update(['views' => $newspaper->views+1]);
        return view('news.show', compact('newspaper'));
    }
}
