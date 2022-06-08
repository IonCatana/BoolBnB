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
        // dd($filters['range']);


        
        $places = Place::cursor()->filter(function($place) use ($lat, $lon) {
            // dump($place, $key);
            return $place->inArea($lat, $lon);
        });
        // $places = Place::all();

        // dd($places);

        return response()->json([
            'success' => true,
            'places' => $places,
        ]);
    }
}
