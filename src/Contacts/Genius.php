<?php
/**
 * Created by PhpStorm.
 * User: htinlynn
 * Date: 11/26/18
 * Time: 4:17 PM
 */

namespace Genius\Contacts;


interface Genius
{
    /**
     * Genius constructor.
     */
    public function __construct();

    /**
     * @param array $phoneNumber
     * @param string $message
     * @return bool
     */
    public function sendSMSService(array $phoneNumber, string $message): bool;

    public function setService(string $service) :string;
}

