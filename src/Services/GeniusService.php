<?php
/**
 * Created by PhpStorm.
 * User: htinlynn
 * Date: 11/26/18
 * Time: 4:17 PM
 */

namespace Genius\Services;


use Genius\Contacts\GeniusInterface;
use Rabbit;

/**
 * Class     Genius Service
 *
 * @package  Htinlynn\Genius\Service
 * @author   HtinLynn <htilin01@gmail.com>
 */
class GeniusService implements GeniusInterface
{
    /**
     * Genius constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $length
     * @param $count
     * @return string
     */
    public function randomDigit($length, $count): string
    {
        $codes = [];
        $stringDigits = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";

        while (count($codes) < $count) {
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString = (string)$randomString . substr($stringDigits, rand(0, strlen($stringDigits) - 1), 1);
            }
            if (!in_array($randomString, $codes)) {
                $codes[] = (string)$randomString;
            }
        }

        return (string)$codes;
    }

    /**
     * @param $size
     * @return string
     */
    public function formatBytes($size): string
    {
        $base = log($size) / log(1024);
        $suffix = array("", "KB", "MB", "GB", "TB");
        $f_base = floor($base);
        return round(pow(1024, $base - floor($base)), 1) . $suffix[$f_base];
    }

    /**
     * @param $needle
     * @param $haystack
     * @author Pyae Hein
     * @return bool
     */
    public function inArrayInsensitive($needle, $haystack): bool
    {
        $needle = strtolower($needle);
        foreach ($haystack as $k => $v) {
            $haystack[$k] = strtolower($v);
        }
        return in_array($needle, $haystack);
    }
}

