<?php

namespace Genius\Providers;

use Arcanedev\Support\Providers\CommandServiceProvider as ServiceProvider;
use Genius\Commands\ClearAndAllCache;

/**
 * Class     CommandsServiceProvider.
 *
 * @author   HtinLynn <htilin01@gmail.com>
 */
class CommandsServiceProvider extends ServiceProvider
{
    /* -----------------------------------------------------------------
     |  Properties
     | -----------------------------------------------------------------
     */

    /**
     * The commands to be registered.
     *
     * @var array
     */
    protected $commands = [
        ClearAndAllCache::class,
    ];
}
