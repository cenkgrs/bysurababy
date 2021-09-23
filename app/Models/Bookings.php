<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    public function booking_items() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\BookingItems', 'request_id', 'request_id');
    }

    public function billing() : \Illuminate\Database\Eloquent\Relations\hasOne
    {
        return $this->hasOne('App\Models\BillingInformations', 'request_id', 'request_id');
    }
}
