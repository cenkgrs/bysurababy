<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Products;

use App\Helpers\Helper;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $bookings = Bookings::with('booking_items', 'billing', 'cargo')->where('user_id', Auth::id())->get();

        if ($request->isMethod('post')) {
            $input = $request->all();

            $booking = Bookings::where('request_id', $input['request_id'])->first();
            
            if (isset($input['cancel'])) {
                $booking->status = 5;
                $booking->save();
            } elseif (isset($input['refund'])) {
                $booking->status = 6;
                $booking->save();
            }
        }

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
                "request_id" => $booking->request_id,
                "products" => $items,
                "total_price" => $booking->total_price,
                "owner" => $booking->contact->name . ' ' . $booking->contact->surname,
                "product_count" => $product_count,
                "order_status" => Helper::getBookingStatus($booking->status),
                "operation" => Helper::getBookingOperation($booking->status),
                "humanized_date" => Helper::getHumanizedDate($booking->created_at),
                "cancel_date" => $booking->cancel_date,
                "created_at" => Helper::getHumanizedDate($booking->created_at, true),
                "status_code" => $booking->status,
                "cargo" => [
                    "created_at" => !$booking->cargo ? null : $booking->cargo->cargo_date,
                    "delivery_date" => !$booking->cargo ? null : $booking->cargo->delivery_date,
                ]
            ];
        }

        $data = [
            "orders" => $orders ?? null,
        ];

        return view('user.orders.index', $data);
    }

    public function order($request_id)
    {
        $booking = Bookings::with('booking_items', 'billing', 'address')->where('request_id', $request_id)->first();

        $items = [];
        $products = [];

        $product_count = 0;

        foreach ($booking->booking_items as $item) {
            $product_count += $item->quantity;

            $product = Products::where('id', $item->id)->first();

            $items[] = [
                "name" => $product->name,
                "quantity" => $product->quantity,
                "photo" => $product->id . ".jpg",
            ];

            $products[] = [
                "id" => $product->id,
                "name" => $product->name,//ucwords(strtolower($product->name)),
                "category" => $product->category->name,
                "sub_category" => $product->sub_category->name,
                "price" => $product->price->sale_price,
                "quantity" => $product_count
            ];
        }

        $order = [
            "request_id" => $booking->request_id,
            "products" => $products,
            "total_price" => $booking->total_price,
            "owner" => $booking->contact->name . ' ' . $booking->contact->surname,
            "product_count" => $product_count,
            "order_status" => Helper::getBookingStatus($booking->status),
            "operation" => Helper::getBookingOperation($booking->status),
            "humanized_date" => Helper::getHumanizedDate($booking->created_at),
            "cancel_date" => Helper::getHumanizedDate($booking->cancel_date),
            "created_at" => Helper::getHumanizedDate($booking->created_at, true),
            "status_code" => $booking->status,
            "delivery" => [
                "address" => $booking->address->address,
                "name" => $booking->address->name,
                "city" => $booking->address->city,
                "district" => $booking->address->district,
            ],
            "payment" => [
                "total_price" => $booking->total_price,
                "cargo_price" => $booking->cargo_price,
                "free_cargo" => $booking->total_price > 150 ? __('150 TL ve Üzeri Kargo Bedava') : false
            ]
        ];

        $data["order"] = $order;

        return view('user.order_detail.index', $data);
    }
}
