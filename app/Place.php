<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    public function messages() {
        return $this->hasMany('App\Message');
    }
}
