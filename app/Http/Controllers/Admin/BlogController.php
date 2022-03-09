<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use DateTime;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index(Request $request)
    {
        $data["blogs"] = Blogs::where('status', 1)->get();

        return view('admin.blogs.index', $data);

    }

    public function updateBlogGet($blog_id)
    {
        $blog = Blogs::where('id', $blog_id)->first();

        if (!$blog) {
            return view('admin.blogs')->with('error_message', 'Aranan blog bulunamadı');
        }

        $data = [
            "blog" => $blog,
        ];

        return view('admin.blogs.update.index', $data);
    }

    public function updateBlogPost(Request $request)
    {
        $input = $request->all();

        // Update Blog
        Blogs::where('id', $input["blog_id"])->update([
            "title" => $input["title"],
            "description" => $input["description"],
            "text" => $input["text"],
            "slug" => $input["slug"],
            "status" => $input["status"],
            "updated_at" => new DateTime,
        ]);

        return redirect()->back()->with('success_message', "Blog Güncellendi");

    }

    public function addBlogGet()
    {
        return view('admin.blogs.add.index');
    }

    public function addBlogPost(Request $request)
    {
        $input = $request->all();

        $blog_id = Blogs::insertGetId([
            "title" => $input["title"],
            "description" => $input["description"],
            "text" => $input["text"],
            "slug" => $input["slug"],
            "status" => true,
            "created_at" => new DateTime,
            "updated_at" => new DateTime,
        ]);

        return redirect()->route('admin.blogs')->with('success_message', "Blog Eklendi");
    }

}
