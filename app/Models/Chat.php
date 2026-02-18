<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
    'ticket_id',
    'user_id',
    'message',
];


    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function ticket()
    {
        return $this->belongsTo(ticket::class);
    }
}
