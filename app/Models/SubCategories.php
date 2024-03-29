<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    public function category(){
        return $this->belongsTo('App\Models\Categories', 'category_id');
    }

    public function scopeRemoveCategory($query, $id)
    {
        return $query->where('id', $id)->delete();
    }
}
