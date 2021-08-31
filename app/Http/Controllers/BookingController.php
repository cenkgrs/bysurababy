<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('booking.payment.index');
        }
    }
}
