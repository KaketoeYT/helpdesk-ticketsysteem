<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['name'];

    public function ticket()
    {
        return $this->BelongsToMany(Ticket::class);
    }
}
