<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TimeBasedRestriction
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
        $time_start_session = Auth::user()->time_begin;
        $time_stop_session = Auth::user()->time_stop;

        if (!now()->isBetween($time_start_session, $time_stop_session)) {

            return response()->view('welcome'); // Status forbidden
        }
        return $next($request);
    }
}
