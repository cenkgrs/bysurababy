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

    public function scopeInsertReview($query, $data)
    {
        return $query->create($data);
    }

    public function scopeUpdateReview($query, $data)
    {
        return $query->where('id', $data['id'])->update($data);
    }

    public function scopeCheckReview($query, $product_id, $user_id)
    {
        $review = $query->where('product_id', $product_id)->where('product_id', $user_id)->first();
    
        return $review ? true : false;
    }

    public function scopeGetReview($query, $id)
    {
        return $query->with('product', 'booking_item')
            ->where(function ($q) {
                $q->where('st_verified', 1)
                ->orWhere('st_waiting', 1)
                ->orWhere('st_denied', 1);
            })->where('user_id', Auth::id())->where('id', $id)->first();
    }

    public function scopeDeleteReview($query, $id)
    {
        return $query->where('id', $id)->delete();
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
