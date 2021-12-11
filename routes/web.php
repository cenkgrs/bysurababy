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

// Home
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('index');
Route::get('/index', 'App\Http\Controllers\HomeController@index')->name('index');

// Products
Route::match(['get', 'post'], '/products', 'App\Http\Controllers\ProductsController@index')->name('products');
Route::match(['get', 'post'], '/products/{product_id}', 'App\Http\Controllers\ProductsController@product')->name('product');

// Orders
Route::match(['get', 'post'], '/siparislerim', 'App\Http\Controllers\OrderController@index')->name('orders');
Route::get('/siparislerim/{request_id}', 'App\Http\Controllers\OrderController@order')->name('order');

// Cart
Route::get('/cart', [ProductsController::class, "cart"])->name('cart');
Route::post('/add-to-cart', [ProductsController::class, "addToCart"])->name('addToCart');

// Booking
Route::match(['get', 'post'], '/booking', 'App\Http\Controllers\BookingController@booking')->name('booking');
Route::get('/finalize', 'App\Http\Controllers\BookingController@finalize')->name('finalize');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('categories');

Route::get('dashboard', 'App\Http\Controllers\Auth\AuthController@dashboard')->name('dashboard');

// Auth
Route::match(['get', 'post'], '/login', 'App\Http\Controllers\Auth\AuthController@login')->name('login');
Route::match(['get', 'post'], '/register', 'App\Http\Controllers\Auth\AuthController@register')->name('register');

Route::get('/logout', 'App\Http\Controllers\Auth\AuthController@signOut')->name('logout');

// Pages
Route::get('/vizyon', 'App\Http\Controllers\PagesController@vision')->name('vision');
Route::get('/misyon', 'App\Http\Controllers\PagesController@mission')->name('mission');

// Blogs
Route::get('/blogs', 'App\Http\Controllers\BlogController@index')->name('blogs');
Route::get('/blog/{$slug}', 'App\Http\Controllers\BlogController@blog')->name('blog');

// Partner
Route::get('/partner', 'App\Http\Controllers\PagesController@partner')->name('partner');
Route::post('/partner-application', 'App\Http\Controllers\PagesController@partnerApply')->name('partner-application');


/* ADMIN */

// Auth
Route::match(['get', 'post'], '/panel/login', 'App\Http\Controllers\Admin\AuthController@login')->name('admin.login');
Route::get('/panel/logout', 'App\Http\Controllers\Admin\AuthController@signOut')->name('admin.logout');

Route::group(['middleware' => 'checkAdmin'], function () {
    Route::get('/panel', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.index');
    Route::get('/panel/dashboard', 'App\Http\Controllers\Admin\DashboardController@index')->name('admin.index');
    
    // Admin - Products
    Route::match(['get', 'post'], 'panel/products', 'App\Http\Controllers\Admin\ProductController@products')->name('admin.products');
    Route::match(['get', 'post'], '/panel/add-product', 'App\Http\Controllers\Admin\ProductController@addProduct')->name('admin.products.addProduct');
    Route::get('/panel/update-product/{product_id}', 'App\Http\Controllers\Admin\ProductController@updateProductGet')->name('admin.products.updateProductGet');
    Route::post('/panel/update-product', 'App\Http\Controllers\Admin\ProductController@updateProductPost')->name('admin.products.updateProductPost');
    
    Route::get('/panel/categories', 'App\Http\Controllers\Admin\DashboardController@categories')->name('admin.categories');
    
    Route::match(['get', 'post'], '/panel/reports/sales', 'App\Http\Controllers\Admin\ReportsController@sales')->name('admin.reports.sales');
    Route::match(['get', 'post'], '/panel/reports/sale/{request_id}', 'App\Http\Controllers\Admin\ReportsController@sale')->name('admin.reports.sale');

    // Users
    Route::get('/panel/users', 'App\Http\Controllers\Admin\UserController@users')->name('admin.users');
    Route::get('/panel/panel-users', 'App\Http\Controllers\Admin\UserController@panelUsers')->name('admin.panelUsers');
});