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

    /* FIX THIS => Multiple review and booking item could have the same request id */
    public function index(Request $request)
    {
        $data = [
            'reviews' => [
                'products' => $this->getNonReviewedProducts(),
                'verified' => $this->getVerifiedReviews(),
                'waiting' => $this->getWaitingReviews(),
                'denied' => $this->getDeniedReviews(),
            ]
        ];

        if ($request->isMethod('get')) {
            return view('user.reviews.index', $data);
        }

    }

    public function addReviewGet(Request $request)
    {
        $request_id = $request->input('request_id');

        $booking_item = BookingItems::getItem($request_id);

        if (!$booking_item) {
            return redirect()->route('reviews');
        }

        $this->checkBookingItemOwnerShip($booking_item);

        // Multiple item booking - get precise one for our review
        if ($booking_item->count() > 1) {

            foreach ($booking_item as $item) {
                if ($item->product_id == $request->input('product_id')) {
                    $booking_item = $item;

                    break;
                }
            }
        }

        $product = Products::getProduct($booking_item->product_id);

        $data = [
            'booking_item' => $booking_item,
            'product' => $product
        ];

        return view('user.reviews.insert.index', $data);
    }

    public function addReviewPost(Request $request)
    {
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

    public function editReviewGet(Request $request)
    {
        $review = Reviews::getReview($request->input('id'));

        if (Auth::id() !== $review->user_id) {
            return redirect()->route('reviews');
        }

        $product = Products::getProduct($review->product_id);

        $data = [
            'product' => $product,
            'review' => $review
        ];

        return view('user.reviews.insert.index', $data);
    }

    public function editReviewPost(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make([], []);

        // The given data did not pass validation
        if ($validator->fails()) {
            return redirect()->route('editReview')->withErrors($validator)->withInput();
        }

        // Validation passed
        Reviews::updateReview($input);

        return redirect()->route('reviews')->with('success_message', __('Değerlendirmeniz alındı. Kısa süre içerisinde onaylandıktan sonra ürün sayfasında yayınlanacaktır'));
    }

    public function deleteReview(Request $request)
    {
        $input = $request->all();

        $review = Reviews::getReview($input['id']);

        if (!$review) {
            return redirect()->route('reviews');
        }

        if (Auth::id() !== $review->id) {
            return redirect()->route('reviews');
        }

        Reviews::deleteReview($input['id']);

        return redirect()->route('reviews')->with('success_message', __('Değerlendirmeniz kaldırıldı.'));
    }

    public function getNonReviewedProducts()
    {
        return BookingItems::getNonReviewedProducts(Auth::id());
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

    private function checkBookingItemOwnerShip($booking_item)
    {
        if (Auth::id() !== $booking_item->bookings->user_id) {
            return redirect()->route('reviews');
        }
    }
}
