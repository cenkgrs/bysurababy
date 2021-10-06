<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function vision()
    {
        $data = [
            "title" => __("Vizyon"),
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

        return view('pages.vision.index', $data);
    }
}
