<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $response = [

        ];

        $products = Products::with('category', 'price')->get();

        foreach ($products as $product) {
            $response["products"][] = [
                "name" => $product->name,
                "code" => $product->code,
                "category" => $product->category->name,
                "price" => $product->price->price,
            ];
        }

        return response()->json(["response" => $response], 200);
    }
}
