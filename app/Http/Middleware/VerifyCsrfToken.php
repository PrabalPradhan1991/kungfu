<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/payment'
    ];

    public $enforce = [
        'get-video-from-link'
    ];

    protected function isReading($request)
    {

        return (in_array($request->method(), ['HEAD', 'GET', 'OPTIONS'])/* && !in_array('get-video-from-link', $this->enforce)*/);
    }
}
