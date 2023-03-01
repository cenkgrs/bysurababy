<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deliveries;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DeliveryController extends Controller
{
    public function getDeliveries()
    {
        $_deliveries = [];

        $deliveries = Deliveries::with('driver')->get();

        foreach ($deliveries as $delivery) {
            $_deliveries[] = [
                "delivery_no" => $delivery->delivery_no,
                "driver_id" => $delivery->driver->id,
                "driver_name" => $delivery->driver->name,
                "address" => $delivery->address,
                "status" => $delivery->status,
                "st_delivery" => $delivery->st_delivery,
                "tt_delivery" => $delivery->tt_delivery,
                "st_complete" => $delivery->st_complete,
                "tt_complete" => $delivery->tt_complete,
                "delivered_person" => $delivery->delivered_person,
            ];
        }

        return response()->json(["deliveries" => $_deliveries], 200);
    }

    public function getActiveDelivery()
    {
        $driver_id = Auth::id();

        $delivery = Deliveries::where('driver_id', $driver_id)->where('st_delivery', true)->first();

        if (!$delivery) {
            return response()->json(["status" => false], 404);
        }

        $_delivery = [
            "delivery_no" => $delivery->delivery_no,
            "driver_id" => $delivery->driver->id,
            "driver_name" => $delivery->driver->name,
            "address" => $delivery->address,
            "status" => $delivery->status,
            "st_delivery" => $delivery->st_delivery,
            "tt_delivery" => $delivery->tt_delivery,
            "st_complete" => $delivery->st_complete,
            "tt_complete" => $delivery->tt_complete,
            "delivered_person" => $delivery->delivered_person,
        ];

        return response()->json(["delivery" => $_delivery], 200);
    }

    public function getDelivery(Request $request)
    {
        $input = $request->all();

        $delivery = Deliveries::with('driver')->where('delivery_no', $input['delivery_no'])->first();

        $_delivery = [
            "delivery_no" => $delivery->delivery_no,
            "driver_id" => $delivery->driver->id,
            "driver_name" => $delivery->driver->name,
            "address" => $delivery->address,
            "status" => $delivery->status,
            "st_delivery" => $delivery->st_delivery,
            "tt_delivery" => $delivery->tt_delivery,
            "st_complete" => $delivery->st_complete,
            "tt_complete" => $delivery->tt_complete,
            "delivered_person" => $delivery->delivered_person,
        ];

        return response()->json(["delivery" => $_delivery], 200);
    }

    public function createDelivery(Request $request)
    {
        $input = $request->all();

        $id = Deliveries::insertGetId([
            'delivery_no' => $input['delivery_no'],
            'driver_id' => $input['driver_id'],
            'address' => $input['address'],
            'status' => 0,
            'st_delivery' => 0,
            'tt_delivery' => null,
            'st_complete' => 0,
            'tt_complete' => null,
            'delivered_person' => null,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        if ($id) {
            return response()->json(['status' => true, 'message' => 'İrsaliye Kaydı Eklendi'], 200);
        }

        return response()->json(['status' => false, 'message' => 'İrsaliye Kaydı Eklenemedi'], 200);
    }

    public function startDelivery(Request $request)
    {
        $input = $request->all();

        Deliveries::where('delivery_no', $input['delivery_no'])->update([
            'st_delivery' => true,
            'tt_delivery' => new DateTime()
        ]);
        
        return response()->json(['status' => true, 'message' => 'Teslimat Başlatıldı'], 200);
    }

    public function completeDelivery(Request $request)
    {
        $input = $request->all();

        $affectedRow = Deliveries::where('delivery_no', $input['delivery_no'])->update([
            'status' => 1,
            'st_complete' => 1,
            'tt_complete' => new DateTime(),
            'delivered_person' => $input['delivered_person'],
        ]);

        if ($affectedRow) {
            return response()->json(['status' => true, 'message' => 'Teslimat Kaydı Eklendi'], 200);
        }

        return response()->json(['status' => false, 'message' => 'Teslimat Kaydı Eklenemedi'], 200);
    }

    public function searchDelivery(Request $request)
    {
        $input = $request->all();

        $deliveries = Deliveries::where('delivery_no', 'LIKE', '%'.$input['query'].'%')->get();

        foreach ($deliveries as $delivery) {
            $_deliveries[] = [
                "delivery_no" => $delivery->delivery_no,
                "driver_id" => $delivery->driver->id,
                "driver_name" => $delivery->driver->name,
                "address" => $delivery->address,
                "status" => $delivery->status,
                "st_delivery" => $delivery->st_delivery,
                "tt_delivery" => $delivery->tt_delivery,
                "st_complete" => $delivery->st_complete,
                "tt_complete" => $delivery->tt_complete,
                "delivered_person" => $delivery->delivered_person,
            ];
        }

        return response()->json(['status' => true, 'deliveries' => $_deliveries], 200);

    }

 
}
