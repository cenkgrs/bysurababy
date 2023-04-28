<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Favorites extends Model
{
    use HasFactory;

    protected $table = 'favorites';

    protected $fillable = ['product_id', 'user_id'];

    public function product() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Products', 'product_id', 'id');
    }

    public static function getFavorites()
    {
        return static::with('product.colors', 'product.price')->where('user_id', Auth::id())->get();
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
        return $query->create(['product_id' => $id, 'user_id' => Auth::id()]);
    }

    public function scopeRemoveFavorite($query, $id)
    {
        return $query->where('id', $id)->delete();
    }


}
