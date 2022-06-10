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
        // dd($request->query());
        $filters = $request->query();
        $lat = Arr::pull($filters, 'lat');
        $lon = Arr::pull($filters, 'lon');
        $amenities = Arr::pull($filters, 'amenities');

        define('DEFAULT_RANGE', 20); // km
        $range = Arr::pull($filters, 'range', DEFAULT_RANGE);
        
        // $place inside area?
        $places = Place::with('amenities')
            ->where('visible',true)
            // TODO ->orderby() sponsored first
            ->cursor()
            ->filter(function($place) use ($lat, $lon, $range) {
            return $place->inArea($lat, $lon, $range);
        });

        // optional filters (rooms, beds, bathrooms)
        if (!empty($filters)) {
            foreach ($filters as $filter => $value) {
                $places = $places->filter(function($place) use ($filter, $value) {
                    return $place[$filter] >= $value;
                });
            }
        }

        // filter by selected amenities
        if (!empty($amenities)) {
            $places = $places->filter(function($place) use ($amenities) {
                // recupero gli id delle amenities di ogni place sotto forma di array
                // per paragonarle a quelle selezionate dall'utente
                $ids = $place->amenities->map(function($amenity) {
                    return $amenity->id;
                });
                
                $has_selected_amenities = false;
                if ( empty(array_diff($amenities, $ids->flatten()->all())) ) $has_selected_amenities = true;
                
                return $has_selected_amenities;
            });
        }

        return response()->json([
            'success' => true,
            'places' => $places,
        ]);
    }
}
