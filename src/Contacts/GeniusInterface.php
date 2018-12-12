<?php
/**
 * Created by PhpStorm.
 * User: htinlynn
 * Date: 11/26/18
 * Time: 4:17 PM
 */

namespace Genius\Contacts;

/**
 * Class     Genius Interface
 *
 * @package  Htinlynn\Genius\Contracts
 * @author   HtinLynn <htilin01@gmail.com>
 */
interface GeniusInterface
{
    /**
     * Genius constructor.
     */
    public function __construct();

    /**
     * @param $length
     * @param $count
     * @return string
     */
    public function randomDigit($length, $count): string;

    /**
     * @param $size
     * @return string
     */
    public function formatBytes($size): string;

    /**
     * @param $textString
     * @return bool
     */
    public function isZawGyi($textString): bool;

    /**
     * @param $text
     * @return string
     */
    public function toUnicode($text): string;

    /**
     * @param $needle
     * @param $haystack
     * @author Pyae Hein
     * @return bool
     */
    public function inArrayInsensitive($needle, $haystack) : bool;


}

