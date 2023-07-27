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

    public function category($slug)
    {
        $category = Categories::with('subCategories')->where('slug', $slug)->first();

        if (!$category) {
            $category = Categories::with('subCategories')->where('slug', $slug)->first();
        }

        $products = Products::with('price', 'category', 'sub_category', 'colors')->where(function ($q) use ($category) {

            $q->where('category_id', $category->id);

            /*
            if (isset($input["sub_category"]) && $input["sub_category"]) {
                $q->where('sub_category_id', $input["sub_category"]);
            }
            */

        })->whereNull('parent_id')->where('status', 1)->paginate(30);

        $data = [
            "title" => __($category->name),
            "breadcrumbs" => [
                0 => [
                    "title" => "Ana Sayfa",
                    "route" => "index"
                ],
                1 => [
                    "title" => __($category->name),
                    "route" => "category",
                ]
                ],
            "products" => $products,
            "category" => $category
        ];

        return view('products.index', $data);
    }
}
