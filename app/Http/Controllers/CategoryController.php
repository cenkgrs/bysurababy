<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Categories;
use App\Models\Products;

class CategoryController extends Controller
{
    public function index(Request $request)
    {

        $input = $request->all();

        $categories = Categories::get();

       

        $categories = Categories::all();

        $products = [];

        foreach ($categories as $category) {
            $products[] = Products::with('price', 'category', 'sub_category', 'colors')->where('category_id', $category->id)->first();
        }

        $data = [
            "categories" => $categories,
            "title" => "Kategoriler",
            "breadcrumbs" => [
                0 => [
                    "title" => "Ana Sayfa",
                    "route" => "index"
                ],
                1 => [
                    "title" => "Kategoriler",
                    "route" => "categories",
                ]
            ],
            "category_stickers" => $categories,
            "sticker_products" => $products,
        ];


        return view('categories.index', $data);
    }
}
