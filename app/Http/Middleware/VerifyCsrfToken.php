<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'membership-silent-response',
        'jcc-response',
        'client-registration-api',
        'client-login-api',
        'post-payment-api',
        'post-card-details-for-token-api',
        'number-verifed', // URL
        'checkemail',
        'checkNumber',
        'fetch',
        'account/job/moveto',
        'account/tradespeople-data',
        // 'account/homeowner-data',
        'get-sub-categories',
        'get-questions',
        'api/*'
    ];
}
