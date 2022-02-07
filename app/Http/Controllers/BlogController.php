<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blogs;

use DB;

class BlogController extends Controller
{
    public function index()
    {
        $data = [
            "blogs" => Blogs::get(),
        ];

        return view('blogs.index', $data);
    }

    public function blog($slug)
    {
        $blog = Blogs::where('slug', $slug)->first();

        $blogs = Blogs::get();

        $data = [
            "blog" => $blog,
            "blogs" => $blogs,
            "title" => $blog->title,
            "breadcrumbs" => [
                0 => [
                    "title" => __("Ana Sayfa"),
                    "route" => "/index"
                ],
                1 => [
                    "title" => __("Blog"),
                    "route" => "/blog",
                ],
                2 => [
                    "title" => ucwords(strtolower($blog->title)),
                    "route" => "/blog/" . $blog->slug,
                ]
            ]
        ];

        return view('blogs.blog.index', $data);
    }
}
