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

        $products = Products::with('price', 'category', 'sub_category', 'colors')->where(function ($q) use ($input) {

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

            })->whereNull('parent_id')->paginate(30);

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
            "title" => __("Ürünler"),
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

    public function product(Request $request, $product_id)
    {
        $input = $request->all();

        $product = Products::with('price', 'category', 'sub_category', 'colors')->where('id', $product_id)->first();

        if ($product->parent_id) {
            $parent = Products::where('id', $product->parent_id)->first();
            $product->colors = $parent->colors;
        }

        $categories = Categories::with('subCategories')->get();

        $similar_products = Products::where('category_id', $product->category_id)->whereNull('parent_id')->where('id', '!=', $product->id)->where('id', '!=', $product->parent_id)->get();

        $data = [
            "product" => $product,
            "parent" => $parent ?? null,
            "similar_products" => $similar_products ?? null,
            //"categories" => $categories,
            "breadcrumbs" => [
                0 => [
                    "title" => "Ana Sayfa",
                    "route" => "/index"
                ],
                1 => [
                    "title" => "Ürünler",
                    "route" => "/products",
                ],
                2 => [
                    "title" => $product->name,
                    "route" => "/products/" . $product->id,
                ]
            ]
        ];


        return view('products.product.index', $data);

    }

    public function cart()
    {
        $cart = session()->get('cart');

        if ($cart) {
            foreach ($cart as $id => $cart_product) {
                $product = Products::where('id', $id)->first();

                $products[$id] = [
                    "name" => $product->name,
                    "category" => $product->category->name,
                    "sub_category" => $product->sub_category->name,
                    "price" => $product->price->sale_price,
                ];

                isset($total_price) ? $total_price += $product->price->sale_price * $cart_product["quantity"] : $total_price = $product->price->sale_price * $cart_product["quantity"];
            }
        }

        $data = [
            "products" => $products ?? null,
            "total_price" => $total_price ?? null,
            "title" => __("Sepetim"),
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

    public function removeFromCart(Request $request)
    {
        $input = $request->all();

        $product = Products::where("id", $input["id"])->first();

        if (!$product) {
            return false;
        }

        $cart = session()->get('cart', []);

        if (!isset($cart['id'])) {
            return false;
        }



    }
}
