<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function messages() {
        return $this->hasMany('App\Message');
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
}
