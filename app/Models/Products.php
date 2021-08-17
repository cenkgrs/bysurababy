<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function price(){
        return $this->hasOne('App\Models\Prices', 'product_id');
    }

    public function category(){
        return $this->belongsTo('App\Models\Categories', 'id');
    }

    public function sub_category(){
        return $this->hasOne('App\Models\SubCategories', 'id');
    }
}
