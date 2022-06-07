<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Place;
use Illuminate\Http\Request;

class SearchAreaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $lat, $lon)
    {
        // dd($lat, $lon);

        $places = Place::cursor()->filter(function($place, $lat, $lon, $range) {
            dump($place->inArea($lat, $lon, $range));
            return $place->inArea($lat, $lon, $range);
        });
        // $places = Place::all();

        // dd($places);

        return response()->json([
            'success' => true,
            'places' => $places,
        ]);
    }
}
