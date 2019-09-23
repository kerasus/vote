<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'medianaSMS' => [
        'normal'  => [
            'url'      => env('MEDIANA_API_URL', 'http://37.130.202.188/api/select'),
            'userName' => env('MEDIANA_USERNAME', 'demo'),
            'password' => env('MEDIANA_PASSWORD', 'demo'),
            'from'     => env('SMS_PROVIDER_DEFAULT_NUMBER', '+98100020400'),
        ],
        'pattern' => [
            'url'      => env('MEDIANA_PATTERN_API_URL', ''),
            'userName' => env('MEDIANA_USERNAME', 'demo'),
            'password' => env('MEDIANA_PASSWORD', 'demo'),
            'from'     => env('SMS_PROVIDER_DEFAULT_NUMBER', '+98100020400'),
        ],

    ],

];
