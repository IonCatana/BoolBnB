<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $guarded = [];

    public function place() {
        return $this->belongsToMany('App\Place')
            ->withPivot('end_time');
    }
}
