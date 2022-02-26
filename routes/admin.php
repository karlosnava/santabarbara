<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\NewspaperController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DirectoryController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\ConfigController;

Route::get('/', HomeController::class)->name('admin.index');

Route::resource('posts', PostController::class)->names('admin.posts');
Route::resource('locations', LocationController::class)->except(['create', 'store', 'destroy'])->names('admin.locations');
Route::resource('newspapers', NewspaperController::class)->except(['index'])->names('admin.newspapers');
Route::resource('banners', BannerController::class)->names('admin.banners');

Route::resource('directories', DirectoryController::class)->names('admin.directories');
Route::put('directories/{directory}', [DirectoryController::class, 'reactivate'])->name('admin.directories.reactivate');

Route::get('newsletters/{directory}', [NewsletterController::class, 'create'])->name('admin.newsletters.create');
Route::post('newsletters/{directory}', [NewsletterController::class, 'store'])->name('admin.newsletters.store');
Route::get('newsletters/{directory}/{newsletter}/edit', [NewsletterController::class, 'edit'])->name('admin.newsletters.edit');
Route::put('newsletters/{directory}/{newsletter}', [NewsletterController::class, 'update'])->name('admin.newsletters.update');
Route::delete('newsletters/{directory}/{newsletter}', [NewsletterController::class, 'destroy'])->name('admin.newsletters.destroy');

Route::resource('configs', ConfigController::class)->names('admin.configs')->only(['index', 'edit', 'update']);
