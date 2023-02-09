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
        return $query->where('user_id', Auth::id())->get() ?? null;
    }
}
