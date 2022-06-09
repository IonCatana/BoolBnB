<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SearchAreaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $filters = $request->query();
        $lat = Arr::pull($filters, 'lat');
        $lon = Arr::pull($filters, 'lon');

        define('DEFAULT_RANGE', 20); // km
        $range = Arr::pull($filters, 'range', DEFAULT_RANGE);
        
        // $place inside area?
        $places = Place::cursor()->where('visible', 1)->filter(function($place) use ($lat, $lon, $range) {
            return $place->inArea($lat, $lon, $range);
        });

        
        // optional filters
        if (!empty($filters)) {
            foreach ($filters as $filter => $value) {
                $places = $places->where('visible', 1)->filter(function($place) use ($filter, $value) {
                    return $place[$filter] >= $value;
                });
            }
        }

        // $places = Place::all();

        return response()->json([
            'success' => true,
            'places' => $places,
        ]);
    }
}
