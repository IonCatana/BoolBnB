<?php

namespace App\Http\Controllers\Host;

use App\Amenity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;
use App\User;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // recuperiamo id utente loggato
        $user_id = auth()->user()->id;
        $places = Place::where('user_id', $user_id)->get();
        
        return view('host.places.index', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenities = Amenity::all();

        return view('host.places.create', compact('amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {

        $validated = $request->validate([
            'title' => 'required|max:200',
            'rooms' => 'nullable|numeric|min:1|max:10',
            'beds' => 'nullable|numeric|min:1|max:4',
            'bathrooms' => 'nullable|numeric|min:1|max:5',
            'square_meters' => 'nullable|numeric|min:30|max:200',
            'address' => 'required|max:255',
            'lat' => 'required|numeric|min:-90|max:90',
            'lon' => 'required|numeric|min:-180|max:180',
            'amenities.*' => 'nullable|exists:amenities,id|array',
            //TODO immagine da validare?
        ]);

        $new_place = new Place();

        $new_place->fill($validated);
        $new_place->user_id = auth()->user()->id;
        $new_place->slug = Place::getUniqueSlug($validated['title']);

        $new_place->save();

        // ho corretto perche nel caso non ci fossero amenities non facciamo niente
        if (array_key_exists('amenities', $validated)) {
            $new_place->amenities()->attach($validated['amenities']);
        }

        return redirect()->route('host.places.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO e se invece ci mettessimo le statistiche anziché creare una rotta custom?
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        $amenities = Amenity::all(); //TODO query amenities places????
        $place->load('amenities');

        return view('host.places.edit', compact('place', 'amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {

        $validated = $request->validate([
            'title' => 'required|max:200',
            'rooms' => 'nullable|numeric|min:1|max:10',
            'beds' => 'nullable|numeric|min:1|max:4',
            'bathrooms' => 'nullable|numeric|min:1|max:5',
            'square_meters' => 'nullable|numeric|min:30|max:200',
            'address' => 'required|max:255',
            'amenities.*' => 'nullable|exists:amenities,id'
        ]);

        if ($validated['title'] != $place->title) {
            $place->slug = Place::getUniqueSlug($validated['title']);
        }
        
        if ($validated['address'] != $place->address) {
            // TODO indirizzo cambiato?->cambia le coordinate
        }

        $place->fill($validated);
        $place->update();

        // verifico se bisogna agggiornare le relazioni alle amenities
        array_key_exists('amenities', $validated)
            ? $place->amenities()->sync($validated['amenities'])
            : $place->amenities()->detach();

        return redirect()->route('host.places.index'); // sarebbe meglio redirigere sulla show sul frontend??
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $place->delete();

        return redirect()->route('host.places.index');
    }
}
