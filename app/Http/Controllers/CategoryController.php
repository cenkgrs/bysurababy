<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Categories;


class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // Remove when publishing - for testing
        if (!Auth::check()) {
            return redirect()->route('index');
        }

        $input = $request->all();

        $categories = Categories::get();

        $data = [
            "categories" => $categories,
            "title" => "Kategoriler",
            "breadcrumbs" => [
                0 => [
                    "title" => "Ana Sayfa",
                    "route" => "index"
                ],
                1 => [
                    "title" => "Kategoriler",
                    "route" => "categories",
                ]
            ],
        ];

        return view('categories.index', $data);
    }
}
