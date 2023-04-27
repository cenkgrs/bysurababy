<?php

namespace App\Models;

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

}
