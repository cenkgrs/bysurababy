<?php

use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\DriverController;
use App\Http\Controllers\Api\AuthController;
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
    Route::get('/get-deliveries', [DeliveryController::class, 'getDeliveries'])->name('getDeliveries');
    Route::get('/get-delivery', [DeliveryController::class, 'getDelivery'])->name('getDelivery');
    Route::get('/get-active-delivery', [DeliveryController::class, 'getActiveDelivery'])->name('getActiveDelivery');

    Route::get('/get-drivers', [DriverController::class, 'getDrivers'])->name('getDrivers');

    /* Post Requests */
    Route::post('/start-delivery', [DeliveryController::class, 'startDelivery'])->name('startDelivery');
    Route::post('/complete-delivery', [DeliveryController::class, 'completeDelivery'])->name('completeDelivery');
    Route::post('/create-delivery', [DeliveryController::class, 'createDelivery'])->name('createDelivery');
    Route::post('/search-delivery', [DeliveryController::class, 'searchDelivery'])->name('searchDelivery');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
