<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = [
        'lat',
        'lng',
    ];

    // relations
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function amenities() {
        return $this->belongsToMany('App\Amenity');
    }

    public function sponsorships() {
        return $this->belongsToMany('App\Sponsorship')
            ->withPivot('end_time');
    }
    
    public function visualisations() {
        return $this->hasMany('App\Visualisation');
    }

    // utilities
    public static function getUniqueSlug($title) {
        $slug_base = Str::slug($title);
        $slug = $slug_base;

        $existing_place = Place::where('slug', $slug)->first();

        $count = 1;
        while ($existing_place) {

            $slug = $slug_base . '-' . $count;
            $existing_place = Place::where('slug', $slug)->first();
            $count++;
        }
        
        return $slug;
    }

}
