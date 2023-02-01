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
        $data = [
            'reviews' => [
                'verified' => $this->getVerifiedReviews(),
                'waiting' => $this->getWaitingReviews(),
                'denied' => $this->getDeniedReviews(),
            ]
        ];

        if ($request->isMethod('get')) {
            return view('user.reviews.index', $data);
        }


    }

    public function getVerifiedReviews()
    {
        $data['reviews'] = Reviews::with('product', 'booking_item')->where('st_verified', 1)->where('user_id', Auth::id())->get();
    }

    public function getWaitingReviews()
    {
        $data['reviews'] = Reviews::with('product', 'booking_item')->where('st_waiting', 1)->where('user_id', Auth::id())->get();
    }

    public function getDeniedReviews()
    {
        $data['reviews'] = Reviews::with('product', 'booking_item')->where('st_denied', 1)->where('user_id', Auth::id())->get();
    }
}
