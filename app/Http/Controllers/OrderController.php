<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Products;

use App\Helpers\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $bookings = Bookings::with('booking_items', 'billing')->where('user_id', Auth::id())->get();

        foreach ($bookings as $booking) {
            
            $items = [];
            $product_count = 0;

            foreach ($booking->booking_items as $item) {
                $product_count += $item->quantity;

                $product = Products::where('id', $item->id)->first();

                $items[] = [
                    "name" => $product->name,
                    "quantity" => $product->quantity,
                    "photo" => $product->id . ".jpg",
                ];
            }

            $orders[] = [
                "products" => $items,
                "total_price" => $booking->total_price,
                "owner" => $booking->contact->name . ' ' . $booking->contact->surname,
                "product_count" => $product_count,
                "order_status" => Helper::getBookingStatus($booking->status),
                "operation" => Helper::getBookingOperation($booking->status),
                "humanized_date" => Helper::getHumanizedDate($booking->created_at),
                "cancel_date" => Helper::getHumanizedDate($booking->cancel_date),
                "created_at" => $booking->created_at,
                "status_code" => $booking->status
            ];
        }

        $data = [
            "orders" => $orders,
        ];

        return view('user.orders.index', $data);
    }

    public function order($request_id)
    {
        $booking = Bookings::with('booking_items', 'billing')->where('request_id', $request_id)->first();

        $items = [];
        $product_count = 0;

        foreach ($booking->booking_items as $item) {
            $product_count += $item->quantity;

            $product = Products::where('id', $item->id)->first();

            $items[] = [
                "name" => $product->name,
                "quantity" => $product->quantity,
                "photo" => $product->id . ".jpg",
            ];
        }

        $orders[] = [
            "products" => $items,
            "total_price" => $booking->total_price,
            "owner" => $booking->contact->name . ' ' . $booking->contact->surname,
            "product_count" => $product_count,
            "order_status" => Helper::getBookingStatus($booking->status),
            "operation" => Helper::getBookingOperation($booking->status),
            "humanized_date" => Helper::getHumanizedDate($booking->created_at),
            "cancel_date" => Helper::getHumanizedDate($booking->cancel_date),
            "created_at" => $booking->created_at,
            "request_id" => $booking->request_id,
            "status_code" => $booking->status
        ];
    }
}
