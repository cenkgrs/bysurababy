<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $products = Products::with('price')->paginate(30);

        $data = [
            "products" => $products,
            "breadcrumbs" => [],
        ];

        return view('products.index', $data);
    }
}
