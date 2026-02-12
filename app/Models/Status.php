<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = [
        'name',
        'is_default',
    ];

    // zorg ervoor dat er maar 1 status de standaard kan zijn
    protected static function booted()
    {
        static::saving(function ($status) {
            // dit word gedaan elke keer dat een status word opgeslagen

            if ($status->is_default) {
                // waar id niet gelijk aan id van deze status zet is_default false
                self::where('id', '!=', $status->id)->update(['is_default' => false]); 
            }

        });
    }

}
