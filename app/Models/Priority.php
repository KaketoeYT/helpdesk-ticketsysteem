<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $fillable = [
        'number',
    ];

    public function ticket()
    {
        return $this->BelongsToMany(Ticket::class);
    }
}
