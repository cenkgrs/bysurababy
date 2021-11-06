<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function sales(Request $request)
    {

        $data['sales'] = Bookings::
        join('booking_items as bi', 'bi.request_id', '=', 'bookings.request_id')
        ->join('products as p', 'p.id', '=', 'bi.product_id')
        ->join('prices as pr', 'pr.id', '=', 'p.price_id')
        ->get();

        dd($data);

        return view('admin.reports.sales');
    }
}
