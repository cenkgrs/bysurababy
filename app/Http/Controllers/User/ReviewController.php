<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $data['reviews'] = Reviews::where('user_id', Auth::id())->get();

        if ($request->isMethod('get')) {
            return view('user.reviews.index', $data);
        }


    }
}
