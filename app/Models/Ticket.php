<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
