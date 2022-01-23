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

            Categories::insert([
                "name" => $input["name"],
                "slug" => strtolower(str_replace(' ', '-', $input["name"])),
                "rating" => $input["rating"],
            ]);

            return redirect()->route('admin.mainCategories')->with('success_message', 'Kategori başarılı bir şekilde eklendi');

        }

        return view('admin.categories.main.index', $data);
    }

    public function subCategories(Request $request)
    {
        $data["categories"] = SubCategories::orderBy('id', 'asc')->get();

        if ($request->isMethod('post')) {

            $input = $request->all();

            SubCategories::insert([
                "name" => $input["name"],
                "slug" => strtolower(str_replace(' ', '-', $input["name"])),
                "rating" => $input["rating"],
            ]);

            return redirect()->route('admin.subCategories')->with('success_message', 'Alt Kategori başarılı bir şekilde eklendi');

        }

        return view('admin.categories.sub.index', $data);
    }

}
