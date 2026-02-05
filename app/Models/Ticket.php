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
    
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function priority()
    {
        return $this->belongsTo(Priority::class);
    }

    public function location()
    {
        return $this->belongsTo(location::class);
    }
}
