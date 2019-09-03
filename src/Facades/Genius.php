<?php
/**
 * Created by PhpStorm.
 * User: htinlynn
 * Date: 11/28/18
 * Time: 11:11 AM.
 */

namespace Genius\Facades;

use Genius\Contacts\GeniusInterface;
use Illuminate\Support\Facades\Facade;

/**
 * Class     Genius Facade.
 *
 * @author   HtinLynn <htilin01@gmail.com>
 */
class Genius extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return GeniusInterface::class;
    }
}
