<?php

namespace App;

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
}
