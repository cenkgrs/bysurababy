<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blogs;
use App\Models\BookingItems;
use App\Models\Products;

use DB;

class HomeController extends Controller
{
    public function index()
    {

        $popular_products = BookingItems::select(DB::raw(""
            . "p.id, p.name"
            . "COUNT(product_id) as product_sold, "
        ))
        ->join('products as p', 'p.id', '=', 'booking_items.product_id')
        ->groupBy('p.id, p.name')->orderBy('product_sold', 'DESC')->take(5);

        $products = [];

        foreach ($popular_products as $product) {
            $products[] = Products::with('price', 'category', 'sub_category', 'colors')->where('id', $product->id)->first();
        }

        $data = [
            "popular_products" => $products,
            "blogs" => Blogs::get()->take(3),
        ];

        return view('home.index', $data);
    }
}
