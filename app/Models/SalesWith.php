<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesWith extends Model
{
    use HasFactory;

    protected $table = 'sales_with_data';

    public function product() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Products', 'relative_id', 'id');
    }

    public function colors() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\Products', 'relative_id');
    }
}
