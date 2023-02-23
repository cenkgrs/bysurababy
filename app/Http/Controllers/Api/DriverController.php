<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ApiUsers;


class DriverController extends Controller
{
   
    public function getDrivers()
    {
        $_drivers = [];

        $drivers = ApiUsers::where('user_type', 'driver')->get();

        foreach ($drivers as $driver) {
            $_drivers[] = [
                "id" => $driver->id,
                "name" => $driver->name,
            ];
        }

        return response()->json(["drivers" => $_drivers], 200);
    }

}