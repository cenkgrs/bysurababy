<?php

use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'auth:sanctum'], function () {
    /* Fetch Request */
    Route::get('/get-products', [ProductController::class, 'getProducts'])->name('getProducts');
    Route::get('/get-all-deliveries', [DeliveryController::class, 'getAllDeliveries'])->name('getAllDeliveries');
    Route::get('/get-deliveries', [DeliveryController::class, 'getDeliveries'])->name('getDeliveries');
    Route::get('/get-delivery', [DeliveryController::class, 'getDelivery'])->name('getDelivery');
    Route::get('/get-active-delivery', [DeliveryController::class, 'getActiveDelivery'])->name('getActiveDelivery');

    Route::get('/get-drivers', [DriverController::class, 'getDrivers'])->name('getDrivers');
    Route::get('/check-driver-status/{driverId}', [DriverController::class, 'checkDriverStatus'])->name('checkDriverStatus');
    Route::get('/get-delivery-no/{driverId}', [DeliveryController::class, 'getDeliveryNo'])->name('getDeliveryNo');

    Route::get('/get-last-locations', [LocationController::class, 'getLastLocations'])->name('getLastLocations');
    Route::get('/get-last-driver-locations{driverId}', [LocationController::class, 'mapTodayLocations'])->name('mapTodayLocations');

    /* Post Requests */
    Route::post('/start-delivery', [DeliveryController::class, 'startDelivery'])->name('startDelivery');
    Route::post('/cancel-delivery', [DeliveryController::class, 'cancelDelivery'])->name('cancelDelivery');
    Route::post('/complete-delivery', [DeliveryController::class, 'completeDelivery'])->name('completeDelivery');
    Route::post('/create-delivery', [DeliveryController::class, 'createDelivery'])->name('createDelivery');
    Route::post('/search-delivery', [DeliveryController::class, 'searchDelivery'])->name('searchDelivery');
    Route::post('/add-location-record', [LocationController::class, 'addLocationRecord'])->name('addLocationRecord');
    Route::post('/create-driver', [DriverController::class, 'createDriver'])->name('createDriver');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
