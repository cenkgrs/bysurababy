<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('api')->attempt($credentials)) {
            return response()->json([
                "status" => true,
            ]);
        } else {
            return response()->json([
                "status" => false
            ]);
        }
    }

    public function logout() {
        Session::flush();
        Auth::guard('api')->logout();

        return response()->json([
            "status" => true,
        ]);
    }

}