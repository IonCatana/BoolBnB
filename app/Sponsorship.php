<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    public function place() {
        return $this->belongsToMany('App\Place')
            ->withPivot('end_time');
    }
}
