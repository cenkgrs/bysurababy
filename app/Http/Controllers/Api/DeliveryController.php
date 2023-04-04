<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Deliveries;
use App\Models\ApiUsers;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Traits\Methods;


class DeliveryController extends Controller
{

    use Methods;

    public function getAllDeliveries()
    {
        $_deliveries = [];

        $deliveries = Deliveries::with('driver')->get();

        foreach ($deliveries as $delivery) {
            $_deliveries[] = [
                "delivery_no" => $delivery->delivery_no,
                "driver_id" => $delivery->driver->id,
                "driver_name" => $delivery->driver->name,
                "firm_name" => $delivery->firm_name,
                "address" => $delivery->address,
                "latitude" => $delivery->latitude,
                "longitude" => $delivery->longitude,
                "status" => $delivery->status,
                "st_delivery" => $delivery->st_delivery,
                "tt_delivery" => $delivery->tt_delivery,
                "st_complete" => $delivery->st_complete,
                "tt_complete" => $delivery->tt_complete,
                "delivered_person" => $delivery->delivered_person,
            ];
        }

        $this->logResult($_deliveries);

        return response()->json(["deliveries" => $_deliveries], 200);
    }

    public function getDeliveries()
    {
        $driver_id = Auth::id();

        $_deliveries = [];

        $deliveries = Deliveries::with('driver')->where('driver_id', $driver_id)->get();

        foreach ($deliveries as $delivery) {
            $_deliveries[] = [
                "delivery_no" => $delivery->delivery_no,
                "driver_id" => $delivery->driver->id,
                "driver_name" => $delivery->driver->name,
                "firm_name" => $delivery->firm_name,
                "address" => $delivery->address,
                "latitude" => $delivery->latitude,
                "longitude" => $delivery->longitude,
                "status" => $delivery->status,
                "st_delivery" => $delivery->st_delivery,
                "tt_delivery" => $delivery->tt_delivery,
                "st_complete" => $delivery->st_complete,
                "tt_complete" => $delivery->tt_complete,
                "delivered_person" => $delivery->delivered_person,
            ];
        }

        $this->logResult($_deliveries);

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
            "firm_name" => $delivery->firm_name,
            "address" => $delivery->address,
            "latitude" => $delivery->latitude,
            "longitude" => $delivery->longitude,
            "status" => $delivery->status,
            "st_delivery" => $delivery->st_delivery,
            "tt_delivery" => $delivery->tt_delivery,
            "st_complete" => $delivery->st_complete,
            "tt_complete" => $delivery->tt_complete,
            "delivered_person" => $delivery->delivered_person,
        ];

        $this->logResult($_delivery);

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
            "firm_name" => $delivery->firm_name,
            "address" => $delivery->address,
            "latitude" => $delivery->latitude,
            "longitude" => $delivery->longitude,
            "status" => $delivery->status,
            "st_delivery" => $delivery->st_delivery,
            "tt_delivery" => $delivery->tt_delivery,
            "st_complete" => $delivery->st_complete,
            "tt_complete" => $delivery->tt_complete,
            "delivered_person" => $delivery->delivered_person,
        ];

        $this->logResult($_delivery);

        return response()->json(["delivery" => $_delivery], 200);
    }

    public function createDelivery(Request $request)
    {
        $this->logRequest($request);

        $input = $request->all();

        $coordinates = $this->getCoordinates($input['address']);
        
        $id = Deliveries::insertGetId([
            'delivery_no' => $input['delivery_no'],
            'driver_id' => $input['driver_id'],
            'address' => $input['address'],
            'latitude' => $coordinates['lat'],
            'longitude' => $coordinates['long'],
            "firm_name" => $input['firm_name'],
            'status' => 0,
            'st_delivery' => 0,
            'tt_delivery' => null,
            'st_complete' => 0,
            'tt_complete' => null,
            'delivered_person' => null,
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);

        $this->logResponse($request, $id);

        if ($id) {
            return response()->json(['status' => true, 'message' => 'İrsaliye Kaydı Eklendi'], 200);
        }

        return response()->json(['status' => false, 'message' => 'İrsaliye Kaydı Eklenemedi'], 200);
    }

    public function startDelivery(Request $request)
    {
        $input = $request->all();

        $driver_id = Auth::id();

        // First check if there is any active delivery
        $anyDelivery = Deliveries::where('driver_id', $driver_id)->where('st_delivery', true)->first();

        if ($anyDelivery) {
            return response()->json(['status' => false, 'message' => 'Aktif bir teslimatınız bulunmaktadır. Farklı bir teslimata başlamadan önce aktif teslimatı tamamlamalı veya iptal etmelisiniz'], 404);
        }

        Deliveries::where('delivery_no', $input['delivery_no'])->update([
            'st_delivery' => true,
            'tt_delivery' => new DateTime()
        ]);
        
        return response()->json(['status' => true, 'message' => 'Teslimat Başlatıldı'], 200);
    }

    public function cancelDelivery(Request $request)
    {
        $input = $request->all();

        $driver_id = Auth::id();

        // First check if there is any active delivery
        $anyDelivery = Deliveries::where('delivery_no', $input['delivery_no'])->where('st_delivery', true)->first();

        if (!$anyDelivery) {
            return response()->json(['status' => false, 'message' => 'Bu teslimat aktif değildir. İptal edilemez'], 404);
        }

        if ($anyDelivery->driver_id !== $driver_id) {
            return response()->json(['status' => false, 'message' => 'Bu teslimat size ait değildir. İptal edemezsiniz'], 404);
        }

        Deliveries::where('delivery_no', $input['delivery_no'])->update([
            'st_delivery' => false,
            'tt_delivery' => null
        ]);
        
        return response()->json(['status' => true, 'message' => 'Teslimat Başlatıldı'], 200);
    }

    public function completeDelivery(Request $request)
    {
        $this->logRequest($request);

        $input = $request->all();

        $affectedRow = Deliveries::where('delivery_no', $input['delivery_no'])->update([
            'status' => 1,
            'st_delivery' => 0,
            'st_complete' => 1,
            'tt_complete' => new DateTime(),
            'delivered_person' => $input['delivered_person'],
            'national_id' => $input['national_id'],
        ]);

        $this->logResponse($request, ['affected_row' => $affectedRow]);

        if ($affectedRow) {
            return response()->json(['status' => true, 'message' => 'Teslimat Kaydı Eklendi'], 200);
        }

        return response()->json(['status' => false, 'message' => 'Teslimat Kaydı Eklenemedi'], 200);
    }

    public function searchDelivery(Request $request)
    {
        $input = $request->all();

        $this->logRequest($request);

        $deliveries = Deliveries::where('delivery_no', 'LIKE', '%'.$input['query'].'%')->get();

        foreach ($deliveries as $delivery) {
            $_deliveries[] = [
                "delivery_no" => $delivery->delivery_no,
                "driver_id" => $delivery->driver->id,
                "driver_name" => $delivery->driver->name,
                "firm_name" => $delivery->firm_name,
                "address" => $delivery->address,
                "latitude" => $delivery->latitude,
                "longitude" => $delivery->longitude,
                "status" => $delivery->status,
                "st_delivery" => $delivery->st_delivery,
                "tt_delivery" => $delivery->tt_delivery,
                "st_complete" => $delivery->st_complete,
                "tt_complete" => $delivery->tt_complete,
                "delivered_person" => $delivery->delivered_person,
            ];
        }

        $this->logResponse($request, json_encode($_deliveries));

        return response()->json(['status' => true, 'deliveries' => $_deliveries], 200);

    }

    public function getCoordinates($address)
    {
        $apiKey = env('GEOAPIFY_KEY'); // Geoapify Api Key

        $params = [
            'apiKey' => $apiKey,
            'text' => $address,
            'format' => 'json',
        ];

        $url = 'https://api.geoapify.com/v1/geocode/search?' . http_build_query($params);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    
        $responseJson = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($responseJson);

        $latitude = $response->results[0]->lat;
        $longitude = $response->results[0]->lon;

        $this->logResult(["lat" => $latitude, "long" => $longitude]);

        return ["lat" => $latitude, "long" => $longitude];
    }

    public function getDeliveryNo($driver_id)
    {
        // Get driver first
        $driver = ApiUsers::where('user_type', 'driver')->where('id', $driver_id)->first();

        // Check if driver has any active delivery
        $delivery = Deliveries::where('driver_id', $driver->id)->where('st_delivery', 1)->first();

        // Driver is idle
        if (!$delivery) {
            return response()->json(["status" => false], 200);
        }

        return response()->json(['status' => true, 'delivery_no' => $delivery->delivery_no], 200);
    }
}
