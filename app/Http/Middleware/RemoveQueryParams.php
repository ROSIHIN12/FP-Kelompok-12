<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RemoveQueryParams
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->query()) {
            $url = $request->url();
            return redirect($url);
        }

        return $next($request);
    }
}
