<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reviews extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    public function booking_item() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\BookingItems', 'request_id', 'request_id');
    }

    public function product() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Products', 'product_id', 'id');
    }

    public function scopeGetReview($query, $id)
    {
        return $query->with('product', 'booking_item')->where('st_verified', 1)->where('user_id', Auth::id())->where('id', $id)->first();
    }

    public function scopeGetVerifiedReviews($query)
    {
        return $query->with('product.price', 'booking_item')->where('st_verified', 1)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
    }

    public function scopeGetWaitingReviews($query)
    {
        return $query->with('product.price', 'booking_item')->where('st_waiting', 1)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
    }

    public function scopeGetDeniedReviews($query)
    {
        return $query->with('product.price', 'booking_item')->where('st_denied', 1)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
    }
}
