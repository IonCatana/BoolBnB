<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    protected $guarded = [
        'img',
        'visible',
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
            ->withPivot('end_time')
            ->withTimestamps();
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
     * @return float $distance || @return false (when search result isn't in the area)
     */
    public function inArea($latitude, $longitude, $radius) {
        $earthRadius = 6371000; // metri
        // convert from degrees to radians
        $lat_from = deg2rad($latitude);
        $lon_from = deg2rad($longitude);
        $lat_to = deg2rad($this->lat);
        $lon_to = deg2rad($this->lon);

        $delta_lon = $lon_to - $lon_from;
        $a = pow(cos($lat_to) * sin($delta_lon), 2) + pow(cos($lat_from) * sin($lat_to) - sin($lat_from) * cos($lat_to) * cos($delta_lon), 2);
        $b = sin($lat_from) * sin($lat_to) + cos($lat_from) * cos($lat_to) * cos($delta_lon);

        $angle = atan2(sqrt($a), $b);
        $distance = $angle * $earthRadius;

        if ($distance > $radius) return false;

        return $distance;
    }

    /**
     * Retreives the model instance of the active sponsorship or null if $place isn't currently sponsored
     */
    public function activeSponsorship() {
        if ($this->sponsorships->isEmpty()) return null;

        // find active sponsorship
        $active_spons = null;
        $active_spons = $this->sponsorships->first(function($spons) {
            return $spons->isActive();
        });

        return $active_spons;
    }

    public function monthlyViews($month, $year) {
        $monthly_views = Visualisation::whereYear('visit_date', $year)
            ->whereMonth('visit_date', $month)
            ->where('place_id', $this->id)
            ->get()
            ->countBy(function($view) {
                return $view->visitor;
            });

        return $monthly_views;
    }
}
