<?php
namespace Genius\Providers;

use Arcanedev\Support\Providers\CommandServiceProvider as ServiceProvider;
use Genius\Commands\ClearAndAllCache;

/**
 * Class     CommandsServiceProvider
 *
 * @package  Htinlynn\Genius\Providers
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
