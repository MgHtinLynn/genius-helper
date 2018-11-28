<?php
/**
 * Created by PhpStorm.
 * User: htinlynn
 * Date: 11/28/18
 * Time: 11:11 AM
 */

namespace Genius\Facades;
use Illuminate\Support\Facades\Facade;
use Genius\Contacts\SMS as SMSContract;

class SMS extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return SMSContract::class; }
}