<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DirectoryController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\ProjectController;

Route::get('/', HomeController::class)->name('admin.index');

Route::resource('locations', LocationController::class)->except(['create', 'store', 'destroy'])->names('admin.locations');
Route::get('locations/{location}/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
Route::post('locations/posts/{location}', [PostController::class, 'store'])->name('admin.posts.store');
Route::get('locations/{location}/posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');
Route::get('locations/{location}/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
Route::delete('locations/{location}/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
Route::put('locations/{location}/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');


// Route::resource('posts', PostController::class)->names('admin.posts');
Route::resource('banners', BannerController::class)->names('admin.banners');
Route::resource('directories', DirectoryController::class)->names('admin.directories');
Route::put('directories/{directory}/reactivate', [DirectoryController::class, 'reactivate'])->name('admin.directories.reactivate');

Route::get('newsletters/{directory}', [NewsletterController::class, 'create'])->name('admin.newsletters.create');
Route::post('newsletters/{directory}', [NewsletterController::class, 'store'])->name('admin.newsletters.store');
Route::get('newsletters/{directory}/{newsletter}/edit', [NewsletterController::class, 'edit'])->name('admin.newsletters.edit');
Route::put('newsletters/{directory}/{newsletter}', [NewsletterController::class, 'update'])->name('admin.newsletters.update');
Route::delete('newsletters/{directory}/{newsletter}', [NewsletterController::class, 'destroy'])->name('admin.newsletters.destroy');

Route::resource('configs', ConfigController::class)->names('admin.configs')->only(['index', 'update']);
Route::resource('projects', ProjectController::class)->names('admin.projects');
