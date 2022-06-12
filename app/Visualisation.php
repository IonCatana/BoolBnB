<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visualisation extends Model
{   
    protected $dates = ['visit_date'];

    public $timestamps=false;

    protected $fillable=[
        'place_id', 'visit_date'
    ];
    
    public function place() {
        return $this->belongsTo('App\Place');
    }
}
