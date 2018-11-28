<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Ooredoo Token
    |--------------------------------------------------------------------------
    |
    | This option allows you to add Ooredoo Serivce Token that should related with Ooredoo Merchant Account
    |
    */

    'token' => env('ooredooToken', 'OoredooSampleToken'),

    /*
    |--------------------------------------------------------------------------
    | Ooredoo Receiver Number
    |--------------------------------------------------------------------------
    |
    | This option allows you to add Ooredoo Serivce Received Number that should related with Ooredoo Merchant Account
    |
    */

    'receivedNumber' => env('receivedNumber', 'ExampleOoredooMerchantNumber'),


    /*
    |--------------------------------------------------------------------------
    | Ooredoo Testing
    |--------------------------------------------------------------------------
    |
    | This option allows you to add Ooredoo Serivce URL that should related with Ooredoo Merchant Account
    |
    */

    'ooredooUrl' => env('ooredooUrl', ''),
    
    /*
    |--------------------------------------------------------------------------
    | Ooredoo Testing
    |--------------------------------------------------------------------------
    |
    | This option allows you to add Ooredoo Serivce Testing that should related with Ooredoo Merchant Account
    |
    */

    'testing' => env('ooredooTesting', false),


    /* -----------------------------------------------------------------
     |  Genius's Facade
     | -----------------------------------------------------------------
     */

    'facade'        => 'Genius',

];
