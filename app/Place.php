<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
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
}
