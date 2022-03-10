<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
        'client_id'     => '261647328436158', //Facebook API
        'client_secret' => '95bae6d003f7bcf638f59d62d6861165', //Facebook Secret
        'redirect'      => 'http://1stopwebsitesolution.com/taxapp/login/facebook/callback',
    ],
    'twitter' => [
        'client_id'     => 'DTHcqwGLrkgAbmHiUhsFg',
        'client_secret' => 'qCN9ZAzXqrUoX3sfmIyjAURuachwOS6gWM8xYVsOU',
        'redirect'      => 'http://1stopwebsitesolution.com/taxapp/login/twitter/callback',
    ],
    'google' => [
        'client_id'     => '114790742580-qtogg7h4vocqqa63gr3kcteqef47btiq.apps.googleusercontent.com',
        'client_secret' => 'yd2c2lKbhfGCuPQryKsMQXvU',
        'redirect'      => 'http://1stopwebsitesolution.com/taxapp/login/google/callback',
    ],

];
