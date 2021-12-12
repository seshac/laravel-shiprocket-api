<?php

namespace Seshac\Shiprocket;

use Illuminate\Support\ServiceProvider;

class ShiprocketServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/shiprocket.php' => config_path('shiprocket.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->app->alias(ShiprocketApi::class, 'shiprocket');
        $this->mergeConfigFrom(__DIR__.'/../config/shiprocket.php', 'shiprocket');
    }
}
