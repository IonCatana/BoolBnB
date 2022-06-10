<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visualisation extends Model
{
    public function place() {
        return $this->belongsTo('App\Place');
    }

    protected $fillable = [
        'place_id',
    ];
}
