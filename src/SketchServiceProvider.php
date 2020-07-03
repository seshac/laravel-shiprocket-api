<?php

namespace Sesha\Sketch;

use Illuminate\Support\ServiceProvider;
use Sesha\Sketch\Commands\SketchCommand;

class SketchServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/sketch.php' => config_path('sketch.php'),
            ], 'config');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/sketch'),
            ], 'views');

            if (! class_exists('CreatePackageTable')) {
                $this->publishes([
                    __DIR__ . '/../database/migrations/create_sketch_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_sketch_table.php'),
                ], 'migrations');
            }

            $this->commands([
                SketchCommand::class,
            ]);
        }

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'sketch');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/sketch.php', 'sketch');
    }
}
