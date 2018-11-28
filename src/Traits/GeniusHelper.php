<?php
/**
 * Created by PhpStorm.
 * User: htinlynn
 * Date: 11/26/18
 * Time: 4:11 PM
 */

namespace Genius\Traits;


use Carbon\Carbon;

trait GeniusHelper
{
    /**
     * @param $value
     * @return float|int|null
     */
    public function dateToEpoch($value)
    {
        if ($value === null) {
            return null;
        }
        return Carbon::parse($value)->timestamp * 1000;
    }

    /**
     * @param $value
     * @return float|int|null
     */
    public function hourToEpoch($value)
    {
        if ($value === null) {
            return null;
        }
        $time = Carbon::parse($value);
        $hour = $time->format('H');
        $minutes = $time->format('i');
        $seconds = $time->format('s');
        return ($hour * 3600 + $minutes * 60 * $seconds) * 1000;
    }

    /**
     * @param $value
     * @return null|string
     */
    public function epochToHour($value)
    {
        if ($value === null) {
            return null;
        }
        return Carbon::createFromTimeStampUTC($value / 1000)->toTimeString();
    }

    /**
     * @param $value
     * @return null|string
     */
    public function epochToDate($value)
    {
        if ($value === null) {
            return null;
        }
        return Carbon::createFromTimeStampUTC($value / 1000)->toDateString();
    }

    /**
     * @param $value
     * @return null|string
     */
    public function toDateFormat($value)
    {
        return Carbon::parse($value)->format('d/m/y');
    }

    /**
     * @param $value
     * @param $format
     * @return null|string
     */
    public function epochToDateByDateFormat($value, $format)
    {
        if ($value == null) {
            return null;
        }
        return Carbon::createFromTimeStampUTC($value / 1000)->format($format);
    }
}