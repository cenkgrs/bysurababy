<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lists extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    public function user() : \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function list_products() : \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Models\ListProducts', 'id', 'list_id');
    }

    public function scopeCreateList($query, $data)
    {
        return $query->insert([
            'user_id' => Auth::id(),
            'name' => $data['name'],
        ]);
    }

    public function scopeUpdateList($query, $data)
    {
        return $query->where('id', $data['list_id'], [
            'name' => $data['name'],
        ]);
    }



}
