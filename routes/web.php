<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
Route::get('/index', 'App\Http\Controllers\HomeController@index')->name('index');


Route::match(['get', 'post'], '/products', 'App\Http\Controllers\ProductsController@index')->name('products');
Route::match(['get', 'post'], '/products/{product_id}', 'App\Http\Controllers\ProductsController@product')->name('product');

// Orders
Route::get('/siparislerim', 'App\Http\Controllers\OrderController@index')->name('orders');

// Cart
Route::get('/cart', [ProductsController::class, "cart"])->name('cart');
Route::post('/add-to-cart', [ProductsController::class, "addToCart"])->name('addToCart');

// Booking
Route::match(['get', 'post'], '/booking', 'App\Http\Controllers\BookingController@booking')->name('booking');
Route::get('/finalize', 'App\Http\Controllers\BookingController@finalize')->name('finalize');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('categories');

Route::get('dashboard', 'App\Http\Controllers\Auth\AuthController@dashboard')->name('dashboard');

Route::match(['get', 'post'], '/login', 'App\Http\Controllers\Auth\AuthController@login')->name('login');
Route::match(['get', 'post'], '/register', 'App\Http\Controllers\Auth\AuthController@register')->name('register');

Route::get('/logout', 'App\Http\Controllers\Auth\AuthController@signOut')->name('logout');

// Pages
Route::get('/vizyon', 'App\Http\Controllers\PagesController@vision')->name('vision');


