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

    public function contact() {
        return $this->hasOne('App\Models\Contacts', 'request_id', 'request_id');
    }

    public function address() {
        return $this->hasOne('App\Models\Addresses', 'id', 'address_id');
    }

    public function cargo() {
        return $this->hasOne('App\Models\CargoInformations', 'request_id', 'request_id');
    }

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
