<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingItems;
use Illuminate\Http\Request;
use App\Models\Bookings;

use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $data['bookings'] = Bookings::selectRaw("SUM(total_price) as total_sale, count(*) as sale_count")->first();

        $data['sales'] = BookingItems::selectRaw("SUM((pr.sale_price - pr.purchase_price) * quantity) as earning")
        ->join('products as p', 'p.id', '=', 'booking_items.product_id')
        ->join('prices as pr', 'pr.id', '=', 'p.price_id')
        ->first();

        return view('admin/dashboard/index', $data);
    }
}
