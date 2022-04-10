<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Admin\Config;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $configs = Config::pluck('value', 'name');
        config(['settings' => $configs]);
    }
}
