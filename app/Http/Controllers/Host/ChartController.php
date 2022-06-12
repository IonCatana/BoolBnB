<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;
use App\Message;
use App\Visualisation;
use Carbon\Carbon;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Place $place)
    {   
        $current_year = Carbon::now()->year;

        // filtriamo le query per anno
        $selected_year = null;
        if ($request->has('year')) {
            $selected_year = $request->input('year');
        } else {
            $selected_year = $current_year; //current year
        }

        // contiamo per ogni mese
        $visualisations = $place->visualisations;
        $monthly_visualisations = [];
        if (!empty($visualisations)) {
            for ($month = 1; $month <= 12; $month++){
                $monthly_visualisations[$month] = $visualisations->filter(function($vis) use ($selected_year, $month) {
                    $visited = $vis->visit_date;
                    return $visited->year == $selected_year && $visited->month == $month;
                })->countBy(function($vis) {
                    return $vis->visitor;
                })->count();
            }
        }

        $messages = $place->messages;
        $monthly_messages = [];
        if (!empty($messages)) {
            for ($month = 1; $month <= 12; $month++){
                $monthly_messages[$month] = $messages->filter(function($mess) use ($selected_year, $month) {
                    $sent = $mess->send_date;
                    return $sent->year == $selected_year && $sent->month == $month;
                })->count();
            }
        }

        // reucuperiamo la prima visualizzazznione per capire su quanti anni dare la possibilita di chiamare le statistiche
        if (!empty($visualisations->all())) {
            $oldest_visualisation = Visualisation::where('place_id', $place->id)
                ->oldest('visit_date')
                ->first();
            // dump($visualisations);
            // dd('oldest', $oldest_visualisation);

            // componiamo l'array degli anni
            $year_one = $oldest_visualisation->visit_date->year;
            $years = [];
            for($y = $current_year; $y >= $year_one; $y--) {
                $years[] = $y;
            }
        } else {
            $years[] = $current_year;
            $selected_year = $current_year;

            // facciamo risultare vuoti questi array bidimensionali (array di collection?)
            $monthly_visualisations = null;
            $monthly_messages = null;
        }

        return view('host.places.chart', compact('monthly_visualisations', 'monthly_messages', 'place', 'years', 'selected_year'));   
    }
}
