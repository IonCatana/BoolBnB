<?php

namespace App\Http\Middleware;

use App\Place;
use Closure;

class CheckVisibilityPermissions
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
        if ($request->input('visible')) {
            // getAllAttributes del model e paragona con $request->input()
        }

        return $next($request);
    }
}
