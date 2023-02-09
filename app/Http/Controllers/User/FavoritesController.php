<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Favorites;

class FavoritesController extends Controller
{
    public function index()
    {
        $favorites = Favorites::getFavorites();
    
        $data = [
            "favorites" => $favorites
        ];

        return view('user.favorites.index', $data);
    }
}