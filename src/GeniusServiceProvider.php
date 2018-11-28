<?php
namespace genius;

use Arcanedev\Support\PackageServiceProvider;
use Genius\Services\GeniusService;
use Genius\Contacts\Genius as GeniusContract;
class GeniusServiceProvider extends PackageServiceProvider
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * Package name.
     *
     * @var string
     */
    protected $package = 'genius';
    /**
     *
     */
    public function boot()
    {
        parent::boot();
        $this->publishConfig();
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
        parent::register();
        $this->registerConfig();
        $this->registerGeniusService();
        $this->registerAliases();
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
        $this->singleton(GeniusContract::class, GeniusService::class);

        // Registering the Facade
        if ($facade = $this->config()->get('geniusService.facade')) {
            $this->alias($facade, Facades\Genius::class);
        }
    }
}