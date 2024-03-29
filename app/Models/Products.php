<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    /* Relations */
    public function price()
    {
        return $this->belongsTo('App\Models\Prices', 'price_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Categories', 'category_id', 'id');
    }

    public function sub_category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\SubCategories', 'sub_category_id');
    }

    public function colors() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Products', 'parent_id');
    }

    public function reviews() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Reviews', 'product_id');
    }

    /* Scope */
    public function scopeGetProduct($query, $id)
    {
        return $query->where('id', $id)->first();
    }
}
