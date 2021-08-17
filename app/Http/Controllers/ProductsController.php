<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $input = $request->all();

        $products = Products::with('price', 'category', 'sub_category')->where(function ($q) {

            if (isset($input["category"]) && $input["category"]) {
                $q->where('category_id', $input["category"]);
            }

            })->paginate(30);

        if (isset($input["category"]) && $input["category"]) {
        }

        $data = [
            "products" => $products,
            "title" => "Ürünler",
            "breadcrumbs" => [
                0 => [
                    "title" => "Ana Sayfa",
                    "route" => "index"
                ],
                1 => [
                    "title" => "Ürünler",
                    "route" => "products",
                ],
                2 => [
                    "title" => "Üst Kıyafet",
                    "route" => "products?category_id=1"
                ]
            ],
        ];

        return view('products.index', $data);
    }
}
