<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route("products");
        }

        if ($request->isMethod('get') && !isset($request->email)) {

            return view('auth.login');
        }

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('products')->withSuccess('Signed in');
        }

        return redirect("login")->withSuccess('Kullanıcı adı veya şifre hatalı');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('auth.register');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ],[
            'password.min' => __('Şifreniz en az 6 haneli olmalıdır'),
            'email.unique' => __('Bu e-posta adresi kullanılmaktadır')
        ]);

        $data = $request->all();

        $check = $this->create($data);

        return redirect("index")->withSuccess('Başarılı bir şekilde üye oldunuz');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('index');
    }
}
