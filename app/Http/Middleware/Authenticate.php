<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\Request;
>>>>>>> 067fd75c7dc15a452907c838c4f003d39372ff04

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
<<<<<<< HEAD
        if (! $request->expectsJson()) {
            return route('login');
=======
        if (!$request->expectsJson()) {
            if (Request::is('admin/*')) {
                return route('AdminFormLogin');
            } else
                return route('login');
>>>>>>> 067fd75c7dc15a452907c838c4f003d39372ff04
        }
    }
}
