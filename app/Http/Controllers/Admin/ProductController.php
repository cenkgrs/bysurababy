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

    public function updateProductGet(Request $request, $product_id)
    {
        $product = Products::where('id', $product_id)->first();

        $sub_products = Products::where('parent_id', $product_id)->get();

        $data = [
            "product" => $product,
            "sub_products" => $sub_products,
            "categories" => Categories::get(),
            "sub_categories" => SubCategories::get(),
        ];

        return view('admin.products.update_product.index', $data);
    }
    
    public function updateProductPost(Request $request)
    {
        $input = $request->all();

        if (isset($input["updateColor"]) && $input["updateColor"]) {

            $image = $request->file('image');

            if (!$image) {
                return redirect()->back()->with('error_message', "Lütfen ürün resmini seçiniz");
            }

            $input['imagename'] = $input["sub_product_id"] . '.' . $image->getClientOriginalExtension();
        
            $destinationPath = public_path('images/products');

            $image->move($destinationPath, $input['imagename']);

            Products::where('id', $input["sub_product_id"])->update([
                "color" => $input["color"],
                "photo" => $input["imagename"],
            ]);

            return redirect()->back()->with('success_message', "Renk Güncellendi");
        }

        if (isset($input["deleteColor"]) && $input["deleteColor"]) {
            Products::where('id', $input["sub_product_id"])->delete();

            return redirect()->route('admin.products.updateProductGet', $input["product_id"])->with('success_message', "Renk Silindi");
        }

        // Add new sub product
        if (isset($input["addColor"]) && $input["addColor"]) {
            $parent = Products::where('id', $input["product_id"])->first();

            Products::insert([
                "parent_id" => $parent->id,
                "code" => $parent->code,
                "name" => $parent->name,
                "category_id" => $parent->category_id,
                "sub_category_id" => $parent->sub_category_id,
                "price_id" => $parent->price_id,
                "color" => $input["color"],
                "gender" => $parent->gender,
                "age" => $parent->age,
                "status" => true,
            ]);

            return redirect()->route('admin.products.updateProductGet', $input["product_id"])->with('success_message', "Renk Eklendi");
        }

        // Update Product
        Products::where('id', $input["product_id"])->update([
            "code" => $input["code"],
            "name" => $input["name"],
            "category_id" => $input["category"],
            "sub_category_id" => $input["sub_category"],
            "color" => $input["color"],
            "gender" => $input["gender"],
            "age" => $input["age"],
            "status" => $input["status"],
        ]);

        // Update Price
        Prices::where('product_id', $input["product_id"])->update([
            "purchase_price" => $input["purchase_price"],
            "sale_price" => $input["sale_price"],
        ]);

        return redirect()->back()->with('success_message', "Ürün Güncellendi");

    }
}
