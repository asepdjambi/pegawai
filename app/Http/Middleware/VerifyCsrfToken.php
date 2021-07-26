<?php

namespace App\Http\Middleware;

use App\Models\gajiberkala;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/tampilberkalafilter'
    ];
}
