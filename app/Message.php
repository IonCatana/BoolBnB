<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'place_id',
        'sender_email',
        'sender_name',
        'object',
        'content'
    ];
    
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    public function formattedDate()
    {
        return $this->created_at->format('M d Y');
    }
}
