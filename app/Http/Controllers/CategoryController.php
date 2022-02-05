<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Categories;
use App\Models\Products;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();

        $data = [
            "categories" => Helper::getCategories(),
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
