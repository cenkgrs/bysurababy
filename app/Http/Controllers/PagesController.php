<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\MailController;
use App\Models\SeoPages;

class PagesController extends Controller
{
    public function vision()
    {
        $data = [
            "title" => __("Vizyonumuz"),
            "breadcrumbs" => [
                0 => [
                    "title" => __("Ana Sayfa"),
                    "route" => "/index"
                ],
                1 => [
                    "title" => __("Vizyon"),
                    "route" => "/vizyon",
                ]
            ]
        ];

        $data["seo_text"] = $this->getSeoText('vision');

        return view('pages.vision.index', $data);
    }

    public function mission()
    {
        $data = [
            "title" => __("Misyonumuz"),
            "breadcrumbs" => [
                0 => [
                    "title" => __("Ana Sayfa"),
                    "route" => "/index"
                ],
                1 => [
                    "title" => __("Misyon"),
                    "route" => "/misyon",
                ]
            ]
        ];

        $data["seo_text"] = $this->getSeoText('mission');

        return view('pages.mission.index', $data);
    }

    public function contact()
    {
        $data = [
            "title" => __("İletişim"),
            "breadcrumbs" => [
                0 => [
                    "title" => __("Ana Sayfa"),
                    "route" => "/index"
                ],
                1 => [
                    "title" => __("İletişim"),
                    "route" => "/contact",
                ]
            ]
        ];

        $data["seo_text"] = $this->getSeoText('contact');

        return view('pages.contact.index', $data);
    }

    public function sss()
    {
        $data = [
            "title" => __("Sıkça Sorulan Sorular"),
            "breadcrumbs" => [
                0 => [
                    "title" => __("Ana Sayfa"),
                    "route" => "/index"
                ],
                1 => [
                    "title" => __("Sıkça Sorulan Sorular"),
                    "route" => "/sss",
                ]
            ]
        ];

        $data["seo_text"] = $this->getSeoText('vision');

        return view('pages.sss.index', $data);
    }

    public function partner()
    {
        return view('pages.partner.form');
    }

    public function partnerApply(Request $request)
    {
        $input = $request->all();

        MailController::basic_email($input);

        return view('pages.partner.form');
    }

    public function getSeoText($slug)
    {
        $seo = SeoPages::where('slug', $slug)->first();

        if ($seo) {
            return $seo->text;
        } else {
            return null;
        }

    }
}