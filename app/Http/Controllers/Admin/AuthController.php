<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        /*if (Auth::guard('admin')->check()) {
            return redirect()->route("admin.index");
        }*/

        if (!$request->isMethod('post')) {
            return view('admin.auth.login');
        }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('panel')->withSuccess('Signed in');
        }

        return view('admin.auth.login')->with('error_message', 'Kullanıcı adı veya şifre hatalı');
    }

    public function signOut() {
        Session::flush();
        Auth::guard('admin')->logout();

        return Redirect('index');
    }
}
