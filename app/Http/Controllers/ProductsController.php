<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Products;
use App\Models\Categories;
use App\Models\SubCategories;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        // Remove when publishing - for testing
        /*if (!Auth::check()) {
            return redirect()->route('index');
        }*/

        $input = $request->all();

        $products = Products::with('price', 'category', 'sub_category')->where(function ($q) use ($input) {

            if (isset($input["category"]) && $input["category"]) {
                $q->where('category_id', $input["category"]);
            }

            if (isset($input["sub_category"]) && $input["sub_category"]) {
                $q->where('sub_category_id', $input["sub_category"]);
            }

            if (isset($input["gender"]) && $input["gender"]) {
                $q->where("gender", $input["gender"]);
            }

            if (isset($input["price-min"]) && $input["price-min"]) {
                $q->whereHas("price", function($q) use ($input) {
                    $q->where("sale_price", ">=", $input["price-min"]);
                });
            }

            if (isset($input["price-max"]) && $input["price-max"]) {
                $q->whereHas("price", function($q) use ($input) {
                    $q->where("sale_price", "<=", $input["price-max"]);
                });
            }

            })->paginate(30);

        if (isset($input["category"]) && $input["category"]) {
            $category = Categories::with('subCategories')->where('id', $input["category"])->first();

            if (!$category) {
                $category = Categories::with('subCategories')->where('slug', $input["category"])->first();
            }
        }
        if (isset($input["sub_category"]) && $input["sub_category"]) {
            $sub_category = SubCategories::where('id', $input["sub_category"])->first();

            if (!$sub_category) {
                $sub_category = SubCategories::where('slug', $input["sub_category"])->first();
            }

            // Get category by sub category
            !isset($category) ? $category = Categories::where('id', $sub_category->category_id)->first() : '' ;
        }

        // Get categories and sub categories for listing
        $categories = Categories::with('subCategories')->get();
        $sub_categories = SubCategories::get();

        $data = [
            "products" => $products,
            "categories" => $categories,
            "sub_categories" => $sub_categories,
            "category" => $category ?? null,
            "sub_category" => $sub_category ?? null,
            "title" => "Ürünler",
            "breadcrumbs" => [
                0 => [
                    "title" => "Ana Sayfa",
                    "route" => "index"
                ],
                1 => [
                    "title" => "Ürünler",
                    "route" => "products",
                ]
            ],
        ];

        // Get category breadcrumb
        if (isset($category)) {
            $data["breadcrumbs"][3] = [
                "title" => $category->name,
                "route" => "products?category=" . $category->id,
            ];
        }

        // Get sub category breadcrumb
        if (isset($sub_category)) {
            $data["breadcrumbs"][4] = [
                "title" => $sub_category->name,
                "route" => "products?sub_category=" . $sub_category->id,
            ];
        }

        return view('products.index', $data);
    }
}
