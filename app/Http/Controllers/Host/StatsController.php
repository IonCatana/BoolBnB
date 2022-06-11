<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;
use App\Visualisation;
use Carbon\Carbon;

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

        foreach($visualisations as $visualisation){
            $date = $visualisation->created_at->format('m');
            if($date == 6){
                dd($date);
            }
        }

        $messages = $place->messages;

        return view('host.places.stats', [
            'visualisations' => $visualisations, 
            'messages' => $messages
        ]);
    }
}
