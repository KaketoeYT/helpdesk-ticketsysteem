<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function ticket()
    {
        return $this->belongsTo(ticket::class);
    }
}
