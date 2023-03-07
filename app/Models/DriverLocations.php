<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverLocations extends Model
{
    use HasFactory;

    protected $table = 'driver_locations';

    public function driver() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\ApiUsers', 'id', 'driver_id');
    }

}
