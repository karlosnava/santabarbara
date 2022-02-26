<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Admin\Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $configs = Config::pluck('value', 'name');
        config(['settings' => $configs]);
    }
}
