<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $dates = ['send_date'];
    
    public function place()
    {
        return $this->belongsTo('App\Place');
    }

    protected $fillable = [
        'place_id',
        'sender_email',
        'sender_name',
        'object',
        'content'
    ];

    public function formattedDate()
    {
        return $this->created_at->format('M d Y');
    }
}
