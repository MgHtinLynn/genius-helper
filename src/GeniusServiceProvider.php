<?php
namespace genius;

use \Illuminate\Support\ServiceProvider;
use Genius\Services\GeniusService;
use Genius\Contacts\Genius as GeniusContract;
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
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            GeniusContract::class,
        ];
    }

    /**
     *
     */
    public function register()
    {
        $this->registerGeniusService();
    }


    /* -----------------------------------------------------------------
     |  Other Methods
     | -----------------------------------------------------------------
     */

    /**
     * Register the log data class.
     */
    private function registerGeniusService()
    {
        $this->app->singleton(GeniusContract::class, GeniusService::class);

        // Registering the Facade
        if ($facade = $this->config()->get('geniusService.facade')) {
            $this->alias($facade, Facades\Genius::class);
        }
    }
}