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

            $missing_attributes = [];
            foreach ($request->input() as $attribute => $value) {
                if (blank($value)) {
                    $missing_attributes[] = $attribute;
                }
            }
            dd($missing_attributes);

            if (!empty($missing_attributes)) {
                return redirect()->route('host.places.fillAttributes', compact('missing_attributes'));
            }
        }

        return $next($request);
    }
}
