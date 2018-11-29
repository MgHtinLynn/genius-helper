<?php
/**
 * Created by PhpStorm.
 * User: htinlynn
 * Date: 11/28/18
 * Time: 11:11 AM
 */

namespace Genius\Facades;
use Illuminate\Support\Facades\Facade;
use Genius\Contacts\Genius as SMSContract;
/**
 * Class     Genius Facade
 *
 * @package  Htinlynn\Genius\Facade
 * @author   HtinLynn <htilin01@gmail.com>
 */
class Genius extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return SMSContract::class; }
}