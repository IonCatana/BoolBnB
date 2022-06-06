<?php

namespace App\Http\Middleware;

use App\Place;
use Closure;
use Illuminate\Support\Str;

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
        
        if (!$request->input('visible')) return $next($request);
        // dd($request);

        $attributes = $request->all();
        $missing_attributes = [];

        //check amenities presence
        if (!array_key_exists('amenities', $attributes)) {
            $missing_attributes[] = 'amenities';
        }

        //controllo se img è nella request o è gia in db
        $place = Place::where('slug', Str::slug($attributes['title']))->first();
        if (!array_key_exists('img', $attributes)
            && ($place != null && blank($place->img) || $place == null)
            ) $missing_attributes[] = 'img';

        // controllo se manca qualche altro attributo
        foreach ($attributes as $attribute => $value) {
            if (blank($value)) {
                $missing_attributes[] = $attribute;
            }
        }
        
        if (empty($missing_attributes)) return $next($request); // TODO qui mi riporta indietro invece di andare a update o store
        dd('middle', empty($missing_attributes));

        $status_message = 'The following fields still need filling!</br>';
        foreach ($missing_attributes as $att) {
            dump($att);
            $status_message .= ' - ' . $att . '</br>';
        }
        return redirect()->back()->with('status', $status_message);
    }
}
