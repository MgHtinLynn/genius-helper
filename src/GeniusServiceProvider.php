<?php
namespace genius;

use \Illuminate\Support\ServiceProvider;

class GeniusServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/geniusService.php' => config_path('geniusService.php'),
            ], 'config');
        }
    }

    /**
     *
     */
    public function register()
    {

    }
}