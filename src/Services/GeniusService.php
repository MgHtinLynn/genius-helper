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
     * @param $textString
     * @return bool
     */
    public function isZawGyi($textString): bool
    {
        $zawGyiRegex = 'ေျ' // e+medial ra

            // beginning e or medial ra
            . '|^ေ|^ျ'
            // independent vowel, dependent vowel, tone , medial ra wa ha (no ya
            // because of 103a+103b is valid in unicode) , digit ,
            // symbol + medial ra
            . '|[ဢ-ူဲ-္ျ-ွ၀-၏]ျ'
            // end with asat
            . '|္$'
            // medial ha + medial wa
            . '|ွြ'
            // medial ra + medial wa
            . '|ျြ'
            // consonant + asat + ya ra wa ha independent vowel e dot below
            // visarga asat medial ra digit symbol
            . '|[က-အ]္[ယရဝဟဢ-ဪေ့-္ျ၀-၏]'
            // II+I II ae
            . '|ီ[ိှဲ]'
            // ae + I II
            . '|ဲ[ိီ]'
            // I II , II I, I I, II II
            //+ "|[ိီ][ိီ]"
            // U UU + U UU
            //+ "|[ုူ][ုူ]" [ FIXED!! It is not so valuable zawgyi pattern ]
            // tall aa short aa
            //+ "|[ါာ][ါာ]" [ FIXED!! It is not so valuable zawgyi pattern ]
            // shan digit + vowel
            . '|[႐-႙][ါ-ူဲ့ြ-ှ]'
            // consonant + medial ya + dependent vowel tone asat
            . '|[က-ဪ]်[ာ-ီဲ-ံ]'
            // independent vowel dependent vowel tone digit + e [ FIXED !!! - not include medial ]
            . '|[ဣ-ူဲ-္၀-၏]ေ'
            // other shapes of medial ra + consonant not in Shan consonant
            . '|[ၾ-ႄ][ခဃစ-ဏဒ-နဖ-ဘဟ]'
            // u + asat
            . '|ဥ္'
            // eain-dray
            . '|[ႁႃ]ႏ'
            // short na + stack characters
            . '|ႏ[ၠ-ႍ]'
            // I II ae dow bolow above + asat typing error
            . '|[ိ-ူဲံ့]္'
            // aa + asat awww
            . '|ာ္'
            // ya + medial wa
            . '|ရြ'
            // non digit + zero + ိ (i vowel) [FIXED!!! rules tested zero + i vowel in numeric usage]
            . '|[^၀-၉]၀ိ'
            // e + zero + vowel
            . '|ေ?၀[ါၚီ-ူဲံ-း]'
            // e + seven + vowel
            . '|ေ?၇[ာ-ူဲံ-း]'
            // cons + asat + cons + virama
            //+ "|[က-အ]်[က-အ]္" [ FIXED!!! REMOVED!!! conflict with Mon's Medial ]
            // U | UU | AI + (zawgyi) dot below
            . '|[ုူဲ]႔'
            // virama + (zawgyi) medial ra
            . '|္[ၾ-ႄ]';

        $ptn = '/' . $zawGyiRegex . '/u';

        if (preg_match_all($ptn, $textString)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $text
     * @return string
     */
    public function toUnicode($text): string
    {
        if ($this->isZawGyi($text)) {
            return Rabbit::zg2uni($text);
        }
        return $text;
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

