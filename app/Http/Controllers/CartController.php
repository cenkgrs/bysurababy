<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Products;
use App\Models\SalesWith;

class CartController extends Controller
{
    public function cart()
    {
        $cart = session()->get('cart');

        if ($cart) {

            $count = 0;

            $relatives = [];

            foreach ($cart as $id => $cart_product) {
                $product = Products::with('category', 'sub_category')->where('id', $id)->first();

                $products[$id] = [
                    "name" => $product->name,//ucwords(strtolower($product->name)),
                    "category" => $product->category->name,
                    "sub_category" => $product->sub_category->name,
                    "price" => $product->price->sale_price,
                    "quantity" => $cart_product["quantity"],
                ];

                isset($total_price) ? $total_price += $product->price->sale_price * $cart_product["quantity"] : $total_price = $product->price->sale_price * $cart_product["quantity"];
            
                // Get only 1 set of relatives according to product
                if ($count == 0 || !$relatives) {
                    $relative_data = SalesWith::with('product.price', 'colors')->where('product_id', $id)->orderBy('rating', 'asc')->get();

                    foreach ($relative_data as $r) {
                        $relatives[] = [
                            'id' => $r->product->id,
                            'name' => $r->product->name,
                            'photo' => $r->product->photo,
                            'price' => $r->price->sale_price,
                            'colors' => $r->colors,
                            'age' => $r->product->age,
                        ];
                    } 
                }
            }
        }

        if (isset($total_price) && $total_price > config('price.cargo.limit')) {
            $free_cargo = true;
        }

        $data = [
            "products" => $products ?? null,
            "total_price" => $total_price ?? null,
            "title" => __("Sepetim"),
            "free_cargo" => $free_cargo ?? false,
            "cargo_price" => config('price.cargo.price'),
            "relatives" => $relatives,
            "breadcrumbs" => [
                0 => [
                    "title" => __("Ana Sayfa"),
                    "route" => "/index"
                ],
                1 => [
                    "title" => __("Sepetim"),
                    "route" => "/cart",
                ]
            ]
        ];

        return view('booking.cart.index', $data);
    }

    public function addToCart(Request $request): bool
    {
        $input = $request->all();

        $product = Products::where("id", $input["id"])->first();

        if (!$product) {
            return false;
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$input["id"]])) {
            $cart[$input['id']]['quantity'] = $cart[$input['id']]['quantity'] + $input["quantity"];
        } else {
            $cart[$input['id']] = [
                "name" => $product->name,
                "quantity" => $input["quantity"],
                "price" => $product->price->sale_price,
            ];
        }

        session()->put('cart', $cart);

        return true;
    }

    public function changeProductQuantity(Request $request)
    {
        $input = $request->all();

        $product = Products::where("id", $input["id"])->first();
        
        if (!$product) {
            return false;
        }

        if ($input["quantity"] == 0 ) {
            return false;
        }

        $cart = session()->get('cart', []);

        if (!isset($cart[$input["id"]])) {
            return false;
        }

        $cart[$input["id"]]["quantity"] = $input["quantity"];

        session()->put('cart', $cart);

        // Calculate new price
        foreach ($cart as $id => $cart_product) {
            $product = Products::where('id', $id)->first();

            isset($total_price) ? $total_price += $product->price->sale_price * $cart_product["quantity"] : $total_price = $product->price->sale_price * $cart_product["quantity"];
        }

        // Check if cargo is free after new calculation
        if (isset($total_price) && $total_price > config('price.cargo.limit')) {
            $free_cargo = true;
        }

        $result = [
            "total_price" => number_format( (float) $total_price, 2, '.', '' ),
            "free_cargo" => $free_cargo ?? false,
        ];

        return ["status" => true, "result" => $result];
    }

    public function removeFromCart(Request $request)
    {
        $input = $request->all();

        $product = Products::where("id", $input["id"])->first();

        if (!$product) {
            return false;
        }

        $cart = session()->get('cart', []);

        if (!isset($cart[$input["id"]])) {
            return false;
        }

        unset($cart[$input["id"]]);

        session()->put('cart', $cart);

        return ["status" => true, "quantity" => count($cart)];
    }
}
