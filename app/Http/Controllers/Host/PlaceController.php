<?php

namespace App\Http\Controllers\Host;

use App\Amenity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class PlaceController extends Controller
{
    /**
     * 
     */
    public function __construct()
    {
        $this->middleware('check.visibility')
            ->only([
                'update',
                'store',
            ]);
    }

    /**
     * Display a listing of the resource.
     * * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // recuperiamo id utente loggato
        $user_id = auth()->user()->id;
        $places = Place::with('amenities')->where('user_id', $user_id)->get();
        
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:200',
            'rooms' => 'nullable|numeric|between:1,255',
            'beds' => 'nullable|numeric|between:1,255',
            'bathrooms' => 'nullable|numeric|between:1,255',
            'square_meters' => 'nullable|numeric|between:1,65535',
            'address' => 'required|max:255',
            'lat' => 'required|numeric|min:-90|max:90',
            'lon' => 'required|numeric|min:-180|max:180',
            'amenities' => 'required|array|min:1',
            'amenities.*' => 'required|min:1|exists:amenities,id',
            'img' => 'nullable|file|mimes:jpeg,jpg,png,webp' ,
            //TODO decidere la grandezze massima dell'immagine caricabile
            'visible' => 'boolean',
        ]);

        if( count($validated['amenities']) == 0)
        {
            // $msg = 'Check at least one amenity ';
            return redirect()->route('host.places.index');
        }

        $new_place = new Place();

        $new_place->fill($validated);
        $new_place->user_id = auth()->user()->id;
        $new_place->slug = Place::getUniqueSlug($validated['title']);

        if(array_key_exists('img', $validated)){
            $img_path = Storage::put('uploads', $validated['img']);
            $new_place->img = $img_path;
        }

        $new_place->save();

        if (array_key_exists('amenities', $validated)) {
            $new_place->amenities()->attach($validated['amenities']);
        }

        return redirect()->route('host.places.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        $amenities = Amenity::all();
        // $place->load('amenities');

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
        // dd('update', $request);
        $validated = $request->validate([
            'title' => 'required|max:200',
            'rooms' => 'nullable|numeric|between:1,255',
            'beds' => 'nullable|numeric|between:1,255',
            'bathrooms' => 'nullable|numeric|between:1,255',
            'square_meters' => 'nullable|numeric|between:1,65535',
            'address' => 'required|max:255',
            'lat' => 'required|numeric|min:-90|max:90',
            'lon' => 'required|numeric|min:-180|max:180',
            'amenities' => 'required|array|min:1',
            'amenities.*' => 'required|min:1|exists:amenities,id',
            'img' => 'nullable|file|mimes:jpeg,jpg,png,webp',
            //TODO decidere la grandezze massima dell'immagine caricabile
            'visible' => 'boolean',
        ]);

        //Controllo che nessuno user non puoi modificare i dati dei altri!
        $user_id = Auth::user()->id;
        if ($user_id != $place->user_id) {
            return redirect()->route('host.places.index'); //TODO da vedere il messaggio di errore
        }

        if ($validated['title'] != $place->title) {
            $place->slug = Place::getUniqueSlug($validated['title']);
        }

        if(array_key_exists('img', $validated)){
            Storage::delete($place->img);
            $img_path = Storage::put('uploads', $validated['img']);
            $place->img = $img_path;
        }
        
        // verifico se bisogna aggiornare le relazioni alle amenities
        array_key_exists('amenities', $validated)
            ? $place->amenities()->sync($validated['amenities'])
            : $place->amenities()->detach();
        
        $place->fill($validated);
        $place->update();
        
        return redirect()->route('host.places.index');
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

   /**
     * Toggle visibility of the specified resource.
     *
     * @param  Place $place
     * @return \Illuminate\Http\Response
     */
    public function toggleVisibility(Place $place)
    {
        // TODO validation
        if (!$place->visible) {
            
            $missing_attributes = $place->getMissingAttributes();
            // dd('toggle', $missing_attributes);
                                  
            if (!$missing_attributes) {
                // se non mancano campi
                $place->visible = true;
                $place->update();

                return redirect()->route('host.places.index');
            }

            // se campi vuoti: utente vai a riempirli!
            $amenities = Amenity::all();
            return view('host.places.fillAttributes', compact('place', 'amenities', 'missing_attributes'));
        }

        // se era gia visibile la spegniamo
        $place->visible = false;
        $place->update();

        return redirect()->route('host.places.index');
        
    }
}