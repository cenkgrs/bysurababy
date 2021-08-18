<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Categories;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();

        $categories = Categories::get();

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
        ];

        return view('categories.index', $data);
    }
}
