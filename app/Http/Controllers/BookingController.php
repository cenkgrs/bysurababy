<?php

namespace App\Http\Controllers;

use App\Models\Addresses;
use App\Models\BookingItems;
use App\Models\Products;
use App\Models\Bookings;
use App\Models\BillingInformations;
use App\Models\Contacts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Validator;
use DateTime;

class BookingController extends Controller
{

    private $request_id;

    public function booking(Request $request)
    {
        if ($request->isMethod('get')) {

            $cart = session()->get('cart');

            if (!$cart) {
                return redirect()->route('cart');
            }

            foreach ($cart as $id => $cart_product) {
                $product = Products::where('id', $id)->first();

                $products[$id] = [
                    "name" => $product->name,//ucwords(strtolower($product->name)),
                    "price" => $product->price->sale_price,
                    "quantity" => $cart_product["quantity"]
                ];

                isset($total_price) ? $total_price += $product->price->sale_price * $cart_product["quantity"] : $total_price = $product->price->sale_price * $cart_product["quantity"];
            }

            if (isset($total_price) && $total_price > 150) {
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

        $input["is_company"] = false;

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

        // Check company informations if selected
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
            return redirect('booking')->withErrors($validator)->withInput();
        }

        $this->request_id = $this->generateRandomString();

        session()->put('request_id', $this->request_id);

        // Insert Contact
        Contacts::updateOrInsert(["request_id" => $this->request_id], [
            "request_id" => $this->request_id,
            "name" => $input["contact"]["name"],
            "surname" => $input["contact"]["surname"],
            "email" => $input["contact"]["email"],
            "phone" => $input["contact"]["phone"],
            "created_at" => new DateTime,
            "updated_at" => new DateTime,
        ]);

        // Insert Billing Informatiıns
        BillingInformations::updateOrInsert(["request_id" => $this->request_id], [
            "request_id" => $this->request_id,
            "name" => $input["billing"]["name"],
            "surname" => $input["billing"]["surname"],
            "phone" => $input["contact"]["phone"],
            "city" => $input["billing"]["city"],
            "district" => $input["billing"]["district"],
            "address" => $input["billing"]["address"],
            "zip_no" => $input["billing"]["zip_no"],
            "type" => $input["is_company"] ? "company" : "personal",
            "firm_name" => $input["billing"]["firm_name"] ?? null,
            "tax_authority" => $input["billing"]["tax_authority"] ?? null,
            "tax_no" => $input["billing"]["tax_no"] ?? null,
            "created_at" => new DateTime,
            "updated_at" => new DateTime,
        ]);

        /*
        //Insert Address Informations
        Addresses::updateOrInsert(["request_id" => $this->request_id], [
            "user_id" => Auth::id(),
            "name" => "",
            "city" => "",
            "district" => "",
            "address" => "",
            "created_at" => new DateTime,
            "updated_at" => new DateTime,
        ]);
        */

        $cart = session()->get('cart');

        if (!$cart) {
            return redirect('booking')->with("error_messages")->withInput();
        }

        // Delete previous products
        BookingItems::where("request_id", $this->request_id)->delete();

        $total_price = 0;
        $total_earning = 0;

        foreach ($cart as $id => $cart_product) {
            $product = Products::where('id', $id)->first();

            // Insert booking item
            BookingItems::insert([
                "request_id" => $this->request_id,
                "product_id" => $product->id,
                "quantity" => $cart_product["quantity"],
                "total_earning" => ($product->price->sale_price - $product->price->purchase_price) * $cart_product["quantity"],  
                "total_price" => $product->price->sale_price * $cart_product["quantity"],
                "created_at" => new DateTime,
                "updated_at" => new DateTime,
            ]);

            $total_price += $product->price->sale_price * $cart_product["quantity"];
            $total_earning += $product->price->purchase_price * $cart_product["quantity"];
        }

        $order_no = $this->generateOrderNo();

        // Insert Booking data
        Bookings::updateOrInsert(["request_id" => $this->request_id], [
            "request_id" => $this->request_id,
            "order_no" => $order_no,
            "user_id" => Auth::id(),
            "total_earning" => $total_earning,
            "total_price" => $total_price,
            "status" => 1,
            "created_at" => new DateTime,
            "updated_at" => new DateTime,
        ]);

        // Delete session cart
        session()->forget('cart');

        // Send booking email

        // Send notification email

        // Return to finalize page
        return redirect('finalize');
    }

    public function finalize(Request $request)
    {

        $this->request_id = session()->get('request_id');

        if (!$this->request_id) {
            return redirect()->route('cart');
        }

        $booking = Bookings::with(['booking_items', 'billing'])->where('request_id', $this->request_id)->first();

        $items = [];

        foreach ($booking->booking_items as $item) {

            $product = Products::where('id', $item->product_id)->first();

            $items[$product->id] = [
                "name" => ucwords(strtolower($product->name)),
                "category" => $product->category->name,
                "sub_category" => $product->sub_category->name,
                "price" => $product->price->sale_price,
                "quantity" => $item["quantity"]
            ];
        }

        $data = [
            "booking" => [
                "request_id" => $this->request_id,
                "total_price" => $booking->total_price,
                "items" => $items,
                "billing" => [
                    "name" => $booking->billing->name,
                    "surname" => $booking->billing->surname,
                    "address" => $booking->billing->address,
                    "phone" => $booking->billing->phone,
                    "city" => $booking->billing->city,
                    "district" => $booking->billing->district,
                    "zip_no" => $booking->billing->zip_no,
                    "type" => $booking->billing->type,
                    "firm_name" => $booking->billing->firm_name,
                    "tax_authority" => $booking->billing->tax_authority,
                    "tax_no" => $booking->billing->tax_no,
                ]
            ]
        ];

        return view('booking.finalize.index', $data);
    }

    public function generateRandomString($length = 10): string
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return "B" . $randomString;
    }

    public function generateOrderNo($length = 6): string
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return "B" . $randomString;
    }
}
