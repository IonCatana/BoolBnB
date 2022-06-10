<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $guarded = [];

    public function place() {
        return $this->belongsToMany('App\Place')
            ->withPivot('end_time')
            ->withTimestamps();
    }

    public function isActive(){
        return $this->pivot->end_time > Carbon::now();
    }

    public function remainingTime() {
        if ($this->isActive()) return Carbon::createFromDate($this->pivot->end_time)->diffForHumans();
    }
}
