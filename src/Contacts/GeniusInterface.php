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
     * @param $needle
     * @param $haystack
     * @author Pyae Hein
     * @return bool
     */
    public function inArrayInsensitive($needle, $haystack) : bool;


    /**
     * @param string $content
     * @param string $default
     * @return mixed
     */
    public function fontDetect(string $content, $default = "zawgyi");

    /**
     * @param string $content
     * @return mixed
     */
    public function isMyanmarSar(string $content);

    /**
     * @param string $content
     * @return mixed
     */
    public function zawGyiToUnicode(string $content);

    /**
     * @param string $content
     * @return mixed
     */
    public function unicodeToZawGyi(string $content);
}

