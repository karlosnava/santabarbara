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

        Storage::deleteDirectory('news');
        Storage::makeDirectory('news');

        Storage::deleteDirectory('banners');
        Storage::makeDirectory('banners');
        
        /*
        Storage::deleteDirectory('podcasts');
        Storage::makeDirectory('podcasts');
        */

        Storage::deleteDirectory('newsletters');
        Storage::makeDirectory('newsletters');

        \App\Models\User::factory(1)->create();
        
        $this->call(ConfigSeeder::class);
        $this->call(LocationSeeder::class);
    }
}
