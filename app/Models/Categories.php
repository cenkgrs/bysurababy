<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    public function subCategories(){
        return $this->hasMany('App\Models\SubCategories', 'category_id');
    }

    public function scopeRemoveCategory($query, $id)
    {
        return $query->where('id', $id)->delete();
    }
}
