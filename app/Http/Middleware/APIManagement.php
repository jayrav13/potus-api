<?php

namespace App\Http\Middleware;

use Closure;
use Log;

class APIManagement
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
        $user = $request->user();
        $user->request_count += 1;
        $user->save();
        return $next($request);
    }
}
