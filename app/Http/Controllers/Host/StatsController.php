<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;

class StatsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Place $place)
    {
        $place->load('visualisations', 'messages');
        
        $visualisations = $place->visualisations;
        $messages = $place->messages;

        return view('host.places.stats', [
            'visualisations' => $visualisations, 
            'messages' => $messages
        ]);
    }
}
