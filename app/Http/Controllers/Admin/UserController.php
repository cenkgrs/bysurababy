<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

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
}
