<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Addresses;

use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    /* Addresses */
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
        $address = Addresses::where('id', $address_id)->first();

        // Address doesn't belong to this user
        if ($address->user_id !== Auth::id()) {
            return redirect()->route('addresses')->with('error_message', "Adres Silinemedi");
        }

        $status = $address->delete();

        if (!$status) {
            return redirect()->route('addresses')->with('error_message', "Adres Silinemedi");
        }

        return redirect()->route('addresses')->with('success_message', "Adres Silindi");
    }

    public function preferences()
    {
        $user = User::where('id', Auth::id())->first();

        $data = [
            'name' => $user->name,
            'email' => $user->email,
        ];

        return view('user.preferences.index', $data);
    }

    public function changePassword(Request $request)
    {
        $input = $request->all();

        // Check old password first
        $user = User::where('id', Auth::id())->first();

        if (!Hash::check($input['password'], $user->password)) {
            return redirect()->back()->with('error_message', __('Eski şifrenizi yanlış girdiniz. Lütfen kontrol edip tekrar deneyiniz.'));
        }

        try {
            $user->password = Hash::make($input['password']);
            $user->save();
        } catch (Exception $ex) {

            return redirect()->back()->with('error_message', __('Şifre değişitirilirken hata oluştu. Lütfen daha sonra tekrar deneyiniz.'));
        }

        return redirect()->back()->with('success_message', __('Şifreniz başarılı bir şekilde değiştirildi.'));
    }

}
