<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ApiUsers;
use App\Models\DriverLocations;
use DateTime;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
   
    public function addLocationRecord(Request $request)
    {
        $input = $request->all();

        $driver_id = Auth::id();

        // Check if any timelapse record last 5 minutes
        if ($input['type'] == 'timelapse') {
            // Get last timelapse record
            $any = DriverLocations::where('type', 'timelapse')->orderBy('id', 'desc')->first();

            $date = Carbon::now()->subMinutes(5)->toDateTimeString();

            // Timelapse request has been made recently so cancel it
            if ($any->created_at >= $date) {
                return response()->json(['status' => false, 'message' => 'Lokasyon Kaydı Eklenemedi'], 200);
            }
        }
        
        $id = DriverLocations::insertGetId([
            'driver_id'     => $driver_id,
            'type'          => $input['type'],
            'address'       => $input['address'],
            'latitude'      => $input['latitude'],
            'longitude'     => $input['longitude'],
            'time'          => new DateTime(),
            'created_at'    => new DateTime(),
            'updated_at'    => new DateTime()
        ]);

        if ($id) {
            return response()->json(['status' => true, 'message' => 'Lokasyon Kaydı Eklendi'], 200);
        }

        return response()->json(['status' => false, 'message' => 'Lokasyon Kaydı Eklenemedi'], 200);
    }

    public function getLastLocations()
    {
        $locations = [];

        $emptyLocations = [];

        $drivers = ApiUsers::where('user_type', 'driver')->get();
        
        foreach ($drivers as $driver) {
            $lastLocation = DriverLocations::where('driver_id', $driver->id)->whereDate('created_at', Carbon::today())->orderBy('created_at', 'DESC')->first();

            if (!$lastLocation) {
                $emptyLocations[] = [
                    'driver_id'     => $driver->id,
                    'driver_name'   => $driver->name,
                    'type'          => 'empty',
                    'address'       => 'empty',
                    'latitude'      => null,
                    'longitude'     => null,
                    'time'          => null
                ];

                continue;
            }

            $locations[] = [
                'driver_id'     => $lastLocation->driver_id,
                'driver_name'   => $driver->name,
                'type'          => $lastLocation->type,
                'address'       => $lastLocation->address,
                'latitude'      => $lastLocation->latitude,
                'longitude'     => $lastLocation->longitude,
                'time'          => $lastLocation->time
            ];
        }

        return response()->json(['locations' => $locations, 'empty_locations' => $emptyLocations], 200);
    }

    public function mapTodayLocations($driver_id)
    {
        $driver = ApiUsers::where('id', $driver_id)->where('user_type', 'driver')->first();

        $locations = [];

        $lastLocations = DriverLocations::where('driver_id', $driver_id)->orderBy('created_at', 'DESC')->get();

        foreach ($lastLocations as $l) {
            $locations[] = [
                'driver_id'     => $driver->id,
                'driver_name'   => $driver->name,
                'type'          => $l->type,
                'address'       => $l->address,
                'latitude'      => $l->latitude,
                'longitude'     => $l->longitude,
                'time'          => $l->time
            ];
        }

        return response()->json(["locations" => $locations], 200);
    }

}