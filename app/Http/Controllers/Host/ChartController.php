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

        // TODO refactor con una sola query usando $place->load()

        for ($month = 1; $month <= 12; $month++){
            $monthlyViews[$month] = $place->monthlyViews($month, $selected_year);

            $ViewsM = Message::whereYear('send_date', $selected_year)
                ->whereMonth('send_date', $month)
                ->where('place_id', $place->id)
                ->get(); 
            $monthlyMessages[$month] = $ViewsM;    
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

        // $place->load(['visualisations', 'messages']);
        // dump('load vis', $place->visualisations->first(), $place->visualisations->count());
        // dump('load mess', $place->messages->first(), $place->messages->count());

        // $visual = Visualisation::where('place_id', $place->id)->count();
        // dump('query vis', $visual);
        // $mess = Message::where('place_id', $place->id)->count();
        // dump('query mess', $mess);
        
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
