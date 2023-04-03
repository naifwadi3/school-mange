<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo( $request)
    {
        if (!$request->expectsJson()) {
            if (Request::is(patterns:app()->getLocale() . '/student/dashboard')) {
                return route('selection');
            }
            elseif(Request::is(patterns:app()->getLocale() . '/teacher/dashboard')) {
                return route('selection');
            }
            elseif(Request::is(patterns:app()->getLocale() . '/parent/dashboard')) {
                return route('selection');
            }
            else {
                return route('selection');
            }
        }
    }        }

