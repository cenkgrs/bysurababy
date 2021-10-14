<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('pages.mission.index', $data);
    }
}