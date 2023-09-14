<?php

declare(strict_types=1);

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

    'api_address' => env('SNAPSHOT_CLOUD_ADDRESS', 'https://example/mycloud'),

    'access_token' => env('SNAPSHOT_CLOUD_ACCESS_TOKEN', 'token'),

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    |
    */
    'max_instance' => env('SNAPSHOT_MAX_INSTANCE', 3),


    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    |
    */
    'snapshot_model' => Kazemmdev\Snapshot\Model\Snapshot::class,
];