<?php

namespace App\Http\Middleware;

use Closure;

class LogQueries
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
//        dd('Logging queries');

        return $next($request);
    }
}
