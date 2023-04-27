<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Favorites;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function addFavorite(Request $request)
    {
        Favorites::addFavorite($request->input('id'));

        return response()->json(['status' => true]);
    }

    public function removeFavorite(Request $request)
    {
        $favorite = Favorites::getFavorite($request->input('id'));

        // If there isnt favorite with this id
        if (!$favorite) {
            return response()->json(['status' => false], 404);
        }

        // If favorite records doesnt belong to this user
        if (Auth::id() !== $favorite->user_id) {
            return response()->json(['status' => false], 404);
        }

        Favorites::removeFavorite($request->input('id'));

        return response()->json(['status' => true]);
    }
}