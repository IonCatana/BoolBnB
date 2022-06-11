<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;
use App\Message;
use App\Visualisation;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Place $place)
    {   
        $place_title = $place->title;
        $monthlyViews = [];
        $monthlyMessages = [];
        $places = Place::where('id', $place->id)->first();
        for ($i = 0; $i < 12; $i++){

            $ViewsV = Visualisation::whereMonth('visit_date', $i)->where('place_id', $place->id)->get();
            $monthlyViews[$i] = $ViewsV;

            $ViewsM = Message::whereMonth('send_date', $i)->where('place_id', $place->id)->get(); 
            $monthlyMessages[$i] = $ViewsM;    
        }
        //dd($monthlyMessages[7]);
        return view('host.places.chart', compact('place_title', 'monthlyViews', 'monthlyMessages', 'place'));
        
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
