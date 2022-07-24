<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\Products;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function sales(Request $request)
    {
        /*
        $data['sales'] = Bookings::with('contact', 'user')->selectRaw("bookings.*, quantity, bi.request_id, bi.created_at, bi.updated_at")
        ->join('booking_items as bi', 'bi.request_id', '=', 'bookings.request_id')
        ->join('products as p', 'p.id', '=', 'bi.product_id')
        ->join('prices as pr', 'pr.id', '=', 'p.price_id')
        ->get();
*/

        $data["sales"] = Bookings::with('booking_items', 'billing', 'contact', 'user')->get();


        return view('admin.reports.sales.index', $data);
    }

    public function sale(Request $request, $request_id)
    {
        $booking = Bookings::with('booking_items', 'billing', 'contact')->where('request_id', $request_id)->first();

        if ($request->isMethod('post')) {
            $input = $request->all();

            if (isset($input['cargo'])) {
                $booking->status = 3;
                $booking->save();
            } elseif (isset($input['sale'])) {
                $booking->status = 1;
                $booking->save();
            } elseif (isset($input['cancel'])) {
                $booking->status = 5;
                $booking->save();
            } elseif (isset($input['prepare'])) {
                $booking->status = 2;
                $booking->save();
            } else if(isset($input['delivered'])) {
                $booking->status = 4;
                $booking->save();
            }
        }
        
        $data['booking'] = [
            "request_id" => $booking->request_id,
            "product_count" => 0,
            "total_price" => $booking->total_price,
            "total_earning" => $booking->total_earning,
            "status" => Helper::getBookingStatus($booking->status),
            "booking_date" => Helper::getHumanizedDate($booking->created_at),
        ];

        $data['booking_items'] = [];

        foreach($booking['booking_items'] as $item) {

            $product = Products::where('id', $item->product_id)->first();

            $data['booking_items'][] = [
                "code"          => $product->code,
                "name"          => $product->name,
                "quantity"      => $item->quantity,
                "total_price"   => $item->total_price,
                "total_earning" => $item->total_earning,
            ];

            $data['booking']['product_count'] += $item->quantity;
        }

        $data["contact"] = [
            "user_id"   => $booking->user_id ? $booking->user_id : "Üye Değil",
            "name"      => $booking->contact->name,
            "surname"   => $booking->contact->surname,
            "email"     => $booking->contact->email,
            "phone"     => $booking->contact->phone,
        ];

        $data["billing"] = [
            "type"          => $booking->billing->type == "personal" ? "Bireysel" : "Kurumsal",
            "name"          => $booking->billing->name,
            "surname"       => $booking->billing->surname,
            "phone"         => $booking->billing->phone,
            "city"          => $booking->billing->city,
            "district"      => $booking->billing->district,
            "address"       => $booking->billing->address,

            "zip_no"        => $booking->billing->zip_no,
            "firm_name"     => $booking->billing->firm_name,
            "tax_authority" => $booking->billing->tax_authority,
            "tax_no"        => $booking->billing->tax_no,
        ];

        return view('admin.reports.sale.index', $data);
    }
}
