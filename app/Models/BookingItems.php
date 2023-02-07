<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingItems extends Model
{
    use HasFactory;

    public function bookings() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Bookings', 'request_id', 'request_id');
    }

    public function product() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Products', 'product_id', 'id');
    }

    public function scopeGetItem($query, $request_id)
    {
        return $query->where('request_id', $request_id)->first() ?? false;
    }

    public function scopeGetNonReviewedProducts($query, $user_id)
    {
        $products = [];

        $items = $query->whereHas('bookings', function ($q) use ($user_id) {
            $q->where('user_id', $user_id);
        })->with('product')->get();

        foreach ($items as $item) {

            // Don't show same product twice
            if (isset($products[$item->product->id])) {
                continue;
            }            

            $anyReview = Reviews::checkReview($item->product_id, $user_id);

            if (!$anyReview) {

                $products[$item->product->id] = [
                    "id" => $item->id,
                    "request_id" => $item->request_id,
                    "product_id" => $item->product->id,
                    "name" => $item->product->name,
                    "photo" => $item->product->photo,
                ];

            }
            
        }

        return $products;
    }
}
