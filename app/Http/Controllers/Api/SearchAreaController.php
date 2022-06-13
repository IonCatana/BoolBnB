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
        // dd($address);
        $filters = $request->query();
        $lat = Arr::pull($filters, 'lat');
        $lon = Arr::pull($filters, 'lon');
        $amenities = Arr::pull($filters, 'amenities');

        define('DEFAULT_RANGE', 20000); // metri
        $range = Arr::pull($filters, 'range', DEFAULT_RANGE);
        
        // $place inside area?
        $places = Place::with('amenities', 'sponsorships')
            ->where('visible',true)
            // ->orderBy()
            ->get()
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

        // TODO ottimizzare
        // riordiniamo le places secondo la distanza dal punto
        $places = $places->mapWithKeys(function($place) use ($lat, $lon, $range) {
            $distance = $place->inArea($lat, $lon, $range);
            if ($place->activeSponsorship() == null) $distance += 30000; // max-range
            return [$distance => $place];
        })->sortKeys()
        ->values();

        return response()->json([
            'success' => true,
            'places' => $places,
        ]);
    }
}
