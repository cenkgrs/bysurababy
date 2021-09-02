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

        // Validate informations

        // Insert Contact

        // Insert Billing Informatiıns

        // Prepare Booking Data


        // Insert Booking data

        // Send booking email

        // Send notification email
    }
}
