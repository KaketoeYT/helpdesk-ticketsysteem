<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
        'subject',
        'description',
        'category_id',
        'priority_id',
        'location_id',
    ];
    
    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function location()
    {
        return $this->hasOne(location::class);
    }
}
