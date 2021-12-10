<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Prices;
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

        if ($request->isMethod('post')) {

            $input = $request->all();

            // First check product code exist
            $parent = Products::where('code', $input['code'])->first();

            if ($parent) {
                $parent_id = $parent->id;
            }

            $product_id = Products::insertGetId([
                "parent_id" => $parent_id ?? null,
                "code" => $input["code"],
                "name" => $input["name"],
                "category_id" => $input["category"],
                "sub_category_id" => $input["sub_category"],
                "price_id" => null,
                "color" => $input["color"],
                "gender" => $input["gender"],
                "age" => $input["age"] 
            ]);

            // If there is parent then price already inserted
            if ($parent) {
                $price = Prices::where('product_id', $parent_id)->first();

                $price_id = $price->id;
            } else {
                $price_id = Prices::insertGetId([
                    "product_id" => $product_id,
                    "purchase_price" => $input["purchase_price"],
                    "sale_price" => $input["sale_price"],
                ]);
            }

            Products::where('id', $product_id)->update(["price_id" => $price_id]);

            return view('admin.products.add_product.index', $data)->with('success_message', "Ürün Eklendi");
        }

        return view('admin.products.add_product.index', $data);
    }

    public function updateProduct()
    {

    }
}
