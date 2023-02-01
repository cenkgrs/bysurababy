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

    public function addReview()
    {

    }

    public function editReview(Request $request){

        $data['review'] = Reviews::getReview($request->input('review_id'));

    }

    public function getVerifiedReviews()
    {
        return Reviews::getVerifiedReviews();
    }

    public function getWaitingReviews()
    {
        return Reviews::getWaitingReviews();
    }

    public function getDeniedReviews()
    {
        return Reviews::getDeniedReviews();
    }
}
