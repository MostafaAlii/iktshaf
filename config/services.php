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

    // Facebook Service Provider
    'facebook' => [
        'client_id' => '256291482947338',
        'client_secret' => 'e3c28520249c52d6d4c27ee73fdbe2a7',
        'redirect' => 'https://iktshaf.itcodedev.com/facebook/callback',
    ],

    // Google Service Provider
    'google' => [
        'client_id' => '709374594619-ndclqam45ti7fj420hdp04ipgetl811u.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://iktshaf.itcodedev.com/google/callback',
    ],


];
