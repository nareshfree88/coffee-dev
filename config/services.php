<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Third Party Services
      |--------------------------------------------------------------------------
      |
      | This file is for storing the credentials for third party services such
      | as Mailgun, SparkPost and others. This file provides a sane default
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
    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],
    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => 'http://islands.cafe/shop/login/google/callback',
//        'redirect' => 'http://localhost/coffee/login/google/callback',
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => 'https://islands.cafe/shop/login/facebook/callback',
//        'redirect' => 'http://localhost/coffee/login/facebook/callback',
    ],
    
    'paypal' => [
        'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID'),
        'client_secret' => env('PAYPAL_SANDBOX_SECRET'),
        'redirect' => "http://localhost/coffee/execute-payment",
        'cancel' => "http://localhost/coffee/payment-error",
        'executeAgreement'=>[
            'success'=>'http://localhost/coffee/execute-agreement/true',
            'failure'=>'http://localhost/coffee/execute-agreement/false'
        ]
    ]
];
