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
    public function index(Request $request, Place $place)
    {   
        // dump($request->has('year'));
        $monthlyViews = [];
        $monthlyMessages = [];

        $selected_year = null;
        if ($request->has('year')) {
            $selected_year = $request->input('year');
        } else {
            $selected_year = Carbon::now()->year; //current year
        }

        $visualisations = $place->visualisations;
        $messages = $place->messages;
        
        for ($month = 1; $month <= 12; $month++){

            $monthlyViews[$month] = $visualisations->filter(function($vis) use ($selected_year, $month) {
                $visited = $vis->visit_date;
                return $visited->year == $selected_year && $visited->month == $month;
            })->countBy(function($vis) {
                return $vis->visitor;
            });
            dump("views {$month}", $monthlyViews[$month]);

            $monthlyMessages[$month] = $messages->filter(function($mess) use ($selected_year, $month) {
                $sent = $mess->send_date;
                return $sent->year == $selected_year && $sent->month == $month;
            })->count();
            dump("messages {$month}", $monthlyMessages[$month]);
        }


        // reucuperiamo la prima visualizzazznione
        $oldest_visualisation = Visualisation::where('place_id', $place->id)
            ->oldest('visit_date')
            ->first();

        $year_one = $oldest_visualisation->visit_date->year;
        $current_year = Carbon::now()->year;
        $years = [];
        for($y = $current_year; $y >= $year_one; $y--) {
            $years[] = $y;
        }

        // passiamo anche $year per poter visualizzare nella select l'anno selezionato
        return view('host.places.chart', compact('monthlyViews', 'monthlyMessages', 'place', 'years', 'selected_year'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //return view('host.places.chart.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
