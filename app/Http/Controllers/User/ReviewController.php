<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

        if ($request->isMethod('post')) {

            $validator = Validator::make(
                [
                    
                ],
                [
                    
                ]
            );

            if ($validator->fails())
            {
                // The given data did not pass validation
                return redirect()->route('editReview')->withErrors($validator);
            }

        }

        return view('user.reviews.edit.index', $data);
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
