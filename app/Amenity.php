<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{   
    protected $guarded=[];

    public function places() {
        return $this->belongsToMany('App\Place');
    }
}
