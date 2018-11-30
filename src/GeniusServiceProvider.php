<?php

namespace genius;

use Arcanedev\Support\PackageServiceProvider;
use Genius\Contacts\BaseRepositoryInterface;
use Genius\Providers\CommandsServiceProvider;
use Genius\Contacts\Genius as GeniusContract;
use Genius\Repository\BaseRepository;
use Genius\Services\GeniusService;

/**
 * Class     Genius Service Provider
 *
 * @package  Htinlynn\Genius
 * @author   HtinLynn <htilin01@gmail.com>
 */
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
            BaseRepositoryInterface::class
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
        $this->registerConsoleServiceProvider(CommandsServiceProvider::class);
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
        //Bind Important Interfaces
        $this->singleton(
            GeniusContract::class,
            GeniusService::class
        );
        $this->singleton(
            BaseRepositoryInterface::class,
            BaseRepository::class
        );

        // Registering the Facade
        if ($facade = $this->config()->get('genius.facade')) {
            $this->alias($facade, Facades\Genius::class);
        }
    }
}