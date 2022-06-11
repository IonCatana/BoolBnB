<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visualisation extends Model
{   
    public $timestamps=false;
    protected $fillable=[
        'place_id', 'visit_date'
    ];
    
    public function place() {
        return $this->belongsTo('App\Place');
    }
}
