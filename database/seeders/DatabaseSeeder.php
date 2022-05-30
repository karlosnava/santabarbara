<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        Storage::deleteDirectory('images');
        Storage::makeDirectory('images');
        Storage::makeDirectory('images/sede-a');
        Storage::makeDirectory('images/sede-b');
        Storage::makeDirectory('images/sede-c');

        Storage::deleteDirectory('banners');
        Storage::makeDirectory('banners');

        Storage::deleteDirectory('newsletters');
        Storage::makeDirectory('newsletters');

        Storage::deleteDirectory('projects');
        Storage::makeDirectory('projects');

        \App\Models\User::factory(1)->create();
        
        $this->call(ConfigSeeder::class);
        $this->call(LocationSeeder::class);
    }
}
