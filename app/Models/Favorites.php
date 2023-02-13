<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Favorites extends Model
{
    use HasFactory;

    protected $table = 'favorites';

    public function product() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Products', 'product_id', 'id');
    }

    public function scopeGetFavorites($query)
    {
        return $query->with('product', 'product.colors', 'product.prices')->where('user_id', Auth::id())->get() ?? null;
    }

    public function scopeGetFavorite($query, $id)
    {
        return $query->where('id', $id)->first() ?? null;
    }

    public function scopeCheckFavorite($query, $id)
    {
        return $query->where('product_id', $id)->where('user_id', Auth::id())->first() ?? null;
    }

    public function scopeAddFavorite($query, $id)
    {
        return $query->create(['product_id', $id, 'user_id' => Auth::id()]);
    }

    public function scopeRemoveFavorite($query, $id)
    {
        return $query->where('id', $id)->delete();
    }


}