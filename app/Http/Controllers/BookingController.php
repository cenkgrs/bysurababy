<?php

namespace App\Http\Controllers;

use App\Models\Products;

use Illuminate\Http\Request;

use Validator;

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
                        "name" => ucwords(strtolower($product->name)),
                        "price" => $product->price->sale_price,
                        "quantity" => $cart_product["quantity"]
                    ];

                    isset($total_price) ? $total_price += $product->price->sale_price * $cart_product["quantity"] : $total_price = $product->price->sale_price * $cart_product["quantity"];
                }
            }

            if (isset($total_price) && $total_price > 100) {
                $free_cargo = true;
            }

            $data = [
                "products" => $products,
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

        $input = $request->all();

        dd($input);

        // Validate billing informations
        $validator = Validator::make($input, [
            'billing.name' => 'required|string',
            'billing.surname' => 'required|string',
            'billing.city' => 'required|string',
            'billing.district' => 'required|string',
            'billing.address' => 'required|string',
            'billing.zip_no' => 'required',
        ]);

        if ($validator->fails()) {
            dd("error1", $validator->errors()->all());
            return redirect('booking')->withErrors($validator)->withInput();
        }

        if (isset($input["is_company"]) && $input["is_company"]) {
            $validator = Validator::make($input, [
                'billing.firm_name' => 'required|string',
                'billing.tax_authority' => 'required|string',
                'billing.tax_no' => 'required',
            ]);

            if ($validator->fails()) {
                dd("error2", $validator->errors()->all());
                return redirect('booking')->withErrors($validator)->withInput();
            }

        }

        // Validate contact informations
        $validator = Validator::make($input, [
            'contact.name' => 'required|string',
            'contact.surname' => 'required|string',
            'contact.email' => 'required|email',
            'contact.phone' => 'required|string',
        ]);

        if ($validator->fails()) {
            dd("error3", $validator->errors()->all());
            return redirect('booking')->withErrors($validator)->withInput();
        }

        dd("input");

        // Insert Contact

        // Insert Billing Informatiıns

        // Prepare Booking Data


        // Insert Booking data

        // Send booking email

        // Send notification email
    }
}
