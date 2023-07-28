<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\MailController;
use App\Models\SeoPages;
use App\Models\Categories;
class PagesController extends Controller
{
    public function search(Request $request)
    {
        $input = $request->all();

        $data = [];

        $results = Categories::where('slug', '%', $input['text'])->take(3)->get();

        foreach ($results as $r) {
            $data['results'][] = [
                'name' => $r->name,
                'route' => route('category', $r->slug)
            ];
        }

        return view('products.index', $data);
    }

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

        $data["seo_text"] = $this->getSeoText('sss');

        return view('pages.sss.index', $data);
    }

    // Dynamic Seo Page
    public function seo($slug)
    {
        $seo = $this->getSeo($slug);

        if (!$seo) {
            abort('404', 404);
        }

        $data = [
            "title" => __($seo->title),
            "breadcrumbs" => [
                0 => [
                    "title" => __('Ana Sayfa'),
                    "route" => "/index"
                ],
                1 => [
                    "title" => __($seo->title),
                    "route" => "/" . $seo->slug,
                ]
            ],
            "text" => $seo->text
        ];

        return view('pages.seo.index', $data);
    }

    public function partner()
    {
        return view('pages.partner.form');
    }

    public function partnerApply(Request $request)
    {
        $input = $request->all();

        MailController::partnerEmail($input);

        return view('pages.partner.form');
    }

    public function getSeo($slug)
    {
        return SeoPages::where('slug', $slug)->first();
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