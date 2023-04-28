<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ListProducts extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    public function list() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Lists', 'list_id', 'id');
    }

    public function products() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Products', 'product_id', 'id');
    }

    public function scopeClearList($query, $data)
    {
        return $query->where('list_id', $data['list_id'])->delete();
    }

    public function scopeAddProductToList($query, $product_id, $list_id)
    {
        return $query->insert([
            'list_id' => $list_id,
            'product_id' => $product_id
        ]);
    }

    public function scopeRemoveProductFromList($query, $product_id, $list_id)
    {
        return $query->where('list_id', $list_id)->where('product_id', $product_id)->delete();
    }

}
