<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Addresses;

use Illuminate\Support\Facades\Auth;
use DateTime;

class UserManagementController extends Controller
{
    
    public function addresses()
    {
        $addresses = Addresses::where('user_id', Auth::id())->get();

        $data = [
            "addresses" => $addresses,
            /*
            "breadcrumbs" => [
                0 => [
                    "title" => __("Ana Sayfa"),
                    "route" => "/index"
                ],
                1 => [
                    "title" => __("Adres Bilgilerim"),
                    "route" => "/adres-bilgilerim",
                ]
            ]
            */
        ];

        return view('user.addresses.index', $data);
    
    }

    public function addAddress(Request $request)
    {
        $input = $request->all();

        $id = Addresses::insertGetId([
            "user_id" => Auth::id(),
            "address_name" => $input["address_name"],
            "name" => $input["name"],
            "surname" => $input["surname"],
            "phone" => $input["phone"],
            "city" => $input["city"],
            "district" => $input["district"],
            "zip_no" => $input["zip_no"],
            "address" => $input["address"],
            "created_at" => new DateTime,
            "updated_at" => new DateTime,
        ]);

        if (!$id) {
            return redirect()->back('addresses')->with('error_message', "Adres Eklenemedi");
        }

        return redirect()->route('addresses')->with('success_message', "Adres Eklendi");
    }

    public function deleteAddress($address_id)
    {
        $status = Addresses::where('id', $address_id)->delete();

        if (!$status) {
            return redirect()->route('addresses')->with('error_message', "Adres Silinemedi");
        }

        return redirect()->route('addresses')->with('success_message', "Adres Silindi");
    }

}
