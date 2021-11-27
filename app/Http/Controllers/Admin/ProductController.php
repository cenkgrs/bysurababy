<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\SubCategories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products(Request $request)
    {
        $input = $request->all();

        $products = Products::where(function ($q) use ($input) {

            if (isset($input["code"]) && $input["code"]) {
                $q->where('code', $input["code"]);
            }

            if (isset($input["category"]) && $input["category"]) {
                $q->where('category_id', $input["category"]);
            }

            if (isset($input["sub_category"]) && $input["sub_category"]) {
                $q->where('sub_category_id', $input["sub_category"]);
            }

            if (isset($input["gender"]) && $input["gender"]) {
                $q->where("gender", $input["gender"]);
            }

        })->whereNull('parent_id')->paginate(30);

        $categories = Categories::get();
        $sub_categories = SubCategories::get();

        $data = [
            "products" => $products,
            "categories" => $categories,
            "sub_categories" => $sub_categories,
        ];

        return view('admin.products.index', $data);
    }

    public function addProduct(Request $request)
    {
        $categories = Categories::get();
        $sub_categories = SubCategories::get();

        $data = [
            "categories" => $categories,
            "sub_categories" => $sub_categories,
        ];

        return view('admin.products.addProduct', $data);
    }

    public function updateProduct()
    {

    }
}
