<?php

namespace App\Http\Controllers;

use App\Models\Products;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function booking(Request $request)
    {
        if ($request->isMethod('get')) {

            $cart = session()->get('cart');

            if ($cart) {
                foreach ($cart as $id => $cart_product) {
                    $product = Products::where('id', $id)->first();

                    $products[$id] = [
                        "name" => $product->name,
                        "category" => $product->category->name,
                        "sub_category" => $product->sub_category->name,
                        "price" => $product->price->sale_price,
                    ];

                    isset($total_price) ? $total_price += $product->price->sale_price * $cart_product["quantity"] : $total_price = $product->price->sale_price * $cart_product["quantity"];
                }
            }

            if (isset($total_price) && $total_price > 100) {
                $free_cargo = true;
            }

            $data = [
                "total_price" => $total_price ?? null,
                "title" => __("Ödeme"),
                "free_cargo" => $free_cargo ?? false,
                "breadcrumbs" => [
                    0 => [
                        "title" => __("Ana Sayfa"),
                        "route" => "/index"
                    ],
                    1 => [
                        "title" => __("Ödeme"),
                        "route" => "/cart",
                    ]
                ]
            ];

            return view('booking.payment.index', $data);
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
