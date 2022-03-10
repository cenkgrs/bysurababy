<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserController extends Controller
{
    public function users()
    {
        $data['users'] = User::get();

        return view('admin.users.site-users.index', $data);
    }

    public function panelUsers()
    {
        $data['panel_users'] = Admin::get();

        return view('admin.users.panel-users.index', $data);
    }

    public function deletePanelUser($user_id)
    {
        Admin::where('id', $user_id)->delete();

        return redirect()->route('admin.panelUsers')->with('success_message', 'Kullanıcı kaldırıldı');
    }

    public function addPanelUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6',
        ],[
            'password.min' => __('Şifreniz en az 6 haneli olmalıdır'),
            'email.unique' => __('Bu e-posta adresi kullanılmaktadır')
        ]);

        $data = $request->all();

        $check = $this->create($data);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.panelUsers')->with('success_message', 'Başarılı bir şekilde kullanıcı oluşturuldu');
        }

        return redirect()->route('admin.panelUsers')->with('error_message', 'Kullanıcı oluşturulamadı');

    }

    public function create(array $data)
    {
        return Admin::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
        ]);
    }
}
