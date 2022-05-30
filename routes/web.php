<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NewspaperController;
use App\Http\Controllers\ProjectController;

Route::get('/', HomeController::class);

Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'store']);

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('news/{newspaper}', [NewspaperController::class, 'show'])->name('news.show');

Route::resource('projects', ProjectController::class)->names('projects')->only(['index', 'show']);
