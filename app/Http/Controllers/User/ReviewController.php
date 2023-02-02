<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BookingItems;
use App\Models\Products;
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

    public function addReview(Request $request, $request_id)
    {
        $booking_item = BookingItems::getItem($request_id);

        $product = Products::getProduct($booking_item->product_id);

        if ($request->isMethod('post')) {
            $input = $request->all();
            
            $validator = Validator::make([], []);

            if ($validator->fails()) {
                // The given data did not pass validation
                return redirect()->route('addReview')->withErrors($validator)->withInput();
            }

            // Validation passed
            Reviews::insertReview($input);

            return redirect()->route('reviews')->with('success_message', __('Değerlendirmeniz alındı. Kısa süre içerisinde onaylandıktan sonra ürün sayfasında yayınlanacaktır'));
        }
    }

    public function editReview(Request $request){

        $data['review'] = Reviews::getReview($request->input('review_id'));

        if ($request->isMethod('post')) {

            $input = $request->all();

            $validator = Validator::make(
                [
                    
                ],
                [
                    
                ]
            );

            if ($validator->fails()) {
                // The given data did not pass validation
                return redirect()->route('editReview')->withErrors($validator)->withInput();
            }

            // Validation passed
            Reviews::updateReview($input);

            return redirect()->route('reviews')->with('success_message', __('Değerlendirmeniz alındı. Kısa süre içerisinde onaylandıktan sonra ürün sayfasında yayınlanacaktır'));

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
