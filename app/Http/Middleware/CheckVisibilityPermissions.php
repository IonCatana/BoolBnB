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
            $attributes = $request->all();
            $missing_attributes = [];

            //check amenities presence
            if (!array_key_exists('amenities', $attributes)) {
                $missing_attributes[] = 'amenities';
            }

            //check img presence
            Place::where()

            if (!array_key_exists('img', $attributes)) {
               $missing_attributes[] = 'img';
            }

            foreach ($attributes as $attribute => $value) {
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
