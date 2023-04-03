<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\SubCategories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function mainCategories(Request $request)
    {
        $data["categories"] = Categories::orderBy('id', 'asc')->get();

        if ($request->isMethod('post')) {

            $input = $request->all();

            if ($input["operation"] == "edit") {

                // Check any same rating
                $any = Categories::where('rating', $input['rating'])->first();

                if ($any) {
                    return redirect()->route('admin.mainCategories')->with('error_messages', 'Aynı ratinge sahip farklı bir ürün var');
                }

                Categories::where('id', $input['category_id'])->update([
                    'name' => $input['name'],
                    'slug' => strtolower(str_replace(' ', '-', $input["name"])),
                    'rating' => $input['rating'],
                ]);

                return redirect()->route('admin.mainCategories')->with('success_message', 'Kategori başarılı bir şekilde güncellendi');

            } else if ($input["operation"] == "insert") {
                Categories::insert([
                    "name" => $input["name"],
                    "slug" => strtolower(str_replace(' ', '-', $input["name"])),
                    "rating" => $input["rating"],
                ]);
    
                return redirect()->route('admin.mainCategories')->with('success_message', 'Kategori başarılı bir şekilde eklendi');
    
            }

           
        }

        return view('admin.categories.main.index', $data);
    }

    public function subCategories(Request $request)
    {
        $data["categories"] = Categories::orderBy('id', 'asc')->get();
        $data["sub_categories"] = SubCategories::with('category')->orderBy('id', 'asc')->get();

        if ($request->isMethod('post')) {

            $input = $request->all();

            if ($input["operation"] == "edit") {

                // Check any same rating
                $any = SubCategories::where('rating', $input['rating'])->first();

                if ($any) {
                    return redirect()->route('admin.subCategories')->with('error_messages', 'Aynı ratinge sahip farklı bir kategori var');
                }

                SubCategories::where('id', $input['category_id'])->update([
                    'name' => $input['name'],
                    'slug' => strtolower(str_replace(' ', '-', $input["name"])),
                    'rating' => $input['rating'],
                ]);

                return redirect()->route('admin.subCategories')->with('success_message', 'Kategori başarılı bir şekilde güncellendi');

            } else if ($input["operation"] == "insert") {
                SubCategories::insert([
                    "name" => $input["name"],
                    "category_id" => $input["main_category"],
                    "slug" => strtolower(str_replace(' ', '-', $input["name"])),
                    "rating" => $input["rating"],
                ]);
    
                return redirect()->route('admin.subCategories')->with('success_message', 'Alt Kategori başarılı bir şekilde eklendi');
    
            }            

        }

        return view('admin.categories.sub.index', $data);
    }

    public function removeCategory(Request $request)
    {
        $input = $request->all();

        if ($input["type"] = "category") {
            Categories::removeCategory($input["id"]);

            return redirect()->route('admin.mainCategories')->with('success_message', 'Kategori kaldırıldı');
        } else {
            SubCategories::removeCategory($input["id"]);
        
            return redirect()->route('admin.subCategories')->with('success_message', 'Alt Kategori kaldırıldı');
        }

    }

}
