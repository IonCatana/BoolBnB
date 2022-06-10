<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Place $place)
    {
        $place->load(['visualisations', 'messages']);
        // $visualisations = $place->visualisations;

        $count = Visualisation::where('place_id', $place->id)->count();

        // dd($visualisations);

        // $place->load(['visualisations']);
        // $visualisations = $place->visualisations;

        // $count = Visualisation::where('place_id', $place->id)->count();

        // dd($count);

        return view('host.places.stats', ['count' => $count]);
    }
}
