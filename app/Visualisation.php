<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visualisation extends Model
{
    protected $fillable = [
        'place_id',
    ];

    public function place() {
        return $this->belongsTo('App\Place');
    }
}
