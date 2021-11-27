<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Products;
use App\Models\SubCategories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = Products::where("parent_id", null)->paginate(10);

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

    }

    public function updateProduct()
    {

    }
}
