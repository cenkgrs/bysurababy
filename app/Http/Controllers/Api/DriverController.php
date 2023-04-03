<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ApiUsers;
use App\Models\Deliveries;
use Illuminate\Support\Facades\Hash;

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

    public function checkDriverStatus(Request $request, $driver_id)
    {
        // Get driver first
        $driver = ApiUsers::where('user_type', 'driver')->where('id', $driver_id)->first();

        // Check if driver has any active delivery
        $delivery = Deliveries::where('driver_id', $driver->id)->where('st_delivery', 1)->first();

        // Driver is idle
        if (!$delivery) {
            return response()->json(["status" => 'passive'], 200);
        }

        return response()->json(["status" => 'active'], 200);
    }

    public function createDriver(Request $request)
    {
        $input = $request->all();

        $id = ApiUsers::insertGetId([
            'user_type'     => 'driver',
            'name'          => $input['driver_name'],
            'email'         => $input['email'],
            'password'      => Hash::make($input['password']),
        ]);

        if ($id) {
            return response()->json(['status' => true, 'message' => 'Yeni Şöför Eklendi'], 200);
        }

        return response()->json(['status' => false, 'message' => 'Yeni Şöför Eklenemedi'], 200);
    }


}