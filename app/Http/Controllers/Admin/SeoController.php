<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoPages;
use DateTime;
use Illuminate\Http\Request;

class SeoController extends Controller
{

    public function seoTexts()
    {
        $data["seo_pages"] = SeoPages::orderBy('id', 'asc')->get();

        return view('admin.seo.index', $data);
    }


    public function addSeoText(Request $request)
    {

        if ($request->isMethod('post')) {

            $input = $request->all();

            $id = SeoPages::insertGetId([
                "slug" => $input["slug"],
                "text" => $input["text"],
                "created_at" => new DateTime,
                "updated_at" => new DateTime
            ]);

            if (!$id) {
                return redirect()->back()->with('error_message', "Seo metni eklenemedi");
            }

            return redirect()->back()->with('success_message', "Seo metni eklendi");
        }

        return view('admin.seo.add.index');
    }

    public function updateSeoText($seo_id, Request $request)
    {
        if ($request->isMethod('post')) {

            $input = $request->all();

            SeoPages::where('id', $seo_id)->update([
                "text" => $input["text"],
                "updated_at" => new DateTime
            ]);

            return redirect()->back()->with('success_message', "Seo metni eklendi");
        }

        $data["page"] = SeoPages::where('id', $seo_id)->first();

        return view('admin.seo.add.index', $data);

    }
}
