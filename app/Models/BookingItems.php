<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingItems extends Model
{
    use HasFactory;

    public function scopeGetItem($query, $request_id)
    {
        return $query->where('request_id', $request_id)->first();
    }
}
