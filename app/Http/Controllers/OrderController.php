<?php

namespace App\Http\Controllers;

use App\Models\Bookings;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Bookings::with('booking_items', 'billing')->where('user_id', Auth::id())->get();

        dd($orders);
    }
}
