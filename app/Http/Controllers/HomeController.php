<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blogs;
use App\Models\Products;

class HomeController extends Controller
{
    public function index()
    {

        $data = [
            "popular" => Products::get()->take(5),
            "blogs" => Blogs::get()->take(3),
        ];

        return view('home.index', $data);
    }
}
