<?php

use App\Http\Controllers\Api\DeliveryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TestController;
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

Route::group(['middleware' => 'checkApi'], function () {
    Route::get('/get-products', [ProductController::class, 'getProducts'])->name('getProducts');
    Route::get('/get-completed-deliveries', [DeliveryController::class, 'getDeliveries'])->name('getDeliveries');
    Route::post('/complete-delivery', [DeliveryController::class, 'completeDelivery'])->name('completeDelivery');
    Route::post('/add-delivery', [DeliveryController::class, 'addDelivery'])->name('addDelivery');

});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [TestController::class, 'login'])->name('login');
Route::get('/logout', [TestController::class, 'logout'])->name('logout');
