<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = [
        'img',
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

    public function messages() {
        return $this->hasMany('App\Message');
    }

    // utilities
    /**
     * Generates a unique slug on this db table
     */
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

    /**
     * Return the blank or empty attributes as an array
     * or false if all the attributes are filled
     * 
     * @return array || @return false
     */
    public function getMissingAttributes() {
        $attributes = $this->attributesToArray();

        $missing_attributes = [];
        foreach ($attributes as $key => $attribute) {
            if (blank($attribute)) {
                $missing_attributes[] = $key;
            }
        }
                    
        if (empty($missing_attributes)) {
            return false;
        }

        return $missing_attributes;
    }

    /**
     * Calculate great-circle distance between 2 points and returns wether it is smaller than $range
     * using the Vincenty formula
     */
    public function inArea($latitude, $longitude, $radius) {
        $earthRadius = 6371000; // meters
        // convert from degrees to radians
        $lat_from = deg2rad($latitude);
        $lon_from = deg2rad($longitude);
        $lat_to = deg2rad($this->lat);
        $lon_to = deg2rad($this->lon);

        $delta_lon = $lon_to - $lon_from;
        $a = pow(cos($lat_to) * sin($delta_lon), 2) + pow(cos($lat_from) * sin($lat_to) - sin($lat_from) * cos($lat_to) * cos($delta_lon), 2);
        $b = sin($lat_from) * sin($lat_to) + cos($lat_from) * cos($lat_to) * cos($delta_lon);

        $angle = atan2(sqrt($a), $b);
        $distance = $angle * $earthRadius; // meters

        return $distance < $radius;
    }
}
