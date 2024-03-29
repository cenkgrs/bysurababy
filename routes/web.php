<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\User\FavoritesController;
use App\Http\Controllers\User\ReviewController;


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

// Cart
Route::get('/cart', [CartController::class, "cart"])->name('cart');
Route::post('/add-to-cart', [CartController::class, "addToCart"])->name('addToCart');
Route::post('/remove-from-cart', [CartController::class, "removeFromCart"])->name('removeFromCart');
Route::post('/change-cart', [CartController::class, "changeProductQuantity"])->name('changeProductQuantity');

// Booking
Route::match(['get', 'post'], '/booking', 'App\Http\Controllers\BookingController@booking')->name('booking');
Route::get('/finalize', 'App\Http\Controllers\BookingController@finalize')->name('finalize');

// Category
Route::get('/kategoriler', [CategoryController::class, "index"])->name('categories');
Route::get('/kategori/{slug}', [CategoryController::class, "category"])->name('category');

Route::get('dashboard', 'App\Http\Controllers\Auth\AuthController@dashboard')->name('dashboard');

// SEO Pages
Route::get('/vizyon', 'App\Http\Controllers\PagesController@vision')->name('vision');
Route::get('/misyon', 'App\Http\Controllers\PagesController@mission')->name('mission');
Route::get('/iletisim', 'App\Http\Controllers\PagesController@contact')->name('contact');
Route::get('/sss', 'App\Http\Controllers\PagesController@sss')->name('sss');
Route::get('/seo/{slug}', 'App\Http\Controllers\PagesController@seo')->name('seo');

// Blogs
Route::get('/blogs', 'App\Http\Controllers\BlogController@index')->name('blogs');
Route::get('/blog/{slug}', 'App\Http\Controllers\BlogController@blog')->name('blog');

// Partner
Route::get('/partner', 'App\Http\Controllers\PagesController@partner')->name('partner');
Route::post('/partner-application', 'App\Http\Controllers\PagesController@partnerApply')->name('partner-application');

// Ajax
Route::post('/arama', 'App\Http\Controllers\PagesController@search')->name('search');


/* USER MANAGEMENT */

// Auth
Route::match(['get', 'post'], '/login', 'App\Http\Controllers\Auth\AuthController@login')->name('login');
Route::match(['get', 'post'], '/register', 'App\Http\Controllers\Auth\AuthController@register')->name('register');
Route::get('/logout', 'App\Http\Controllers\Auth\AuthController@signOut')->name('logout');

Route::group(['middleware' => 'checkUser'], function () {
    
    // Orders
    Route::match(['get', 'post'], '/siparislerim', 'App\Http\Controllers\OrderController@index')->name('orders');
    Route::get('/siparislerim/{request_id}', 'App\Http\Controllers\OrderController@order')->name('order');

    // Addresses
    Route::get('/adres-bilgilerim', 'App\Http\Controllers\UserManagementController@addresses')->name('addresses');
    Route::post('/adres-bilgilerim/adres-ekle', 'App\Http\Controllers\UserManagementController@addAddress')->name('addAddress');
    Route::get('/adres-bilgilerim/adres-sil/{address_id}', 'App\Http\Controllers\UserManagementController@deleteAddress')->name('deleteAddress');

    // Reviews
    Route::match(['get', 'post'], '/degerlendirmelerim', [ReviewController::class, "index"])->name('reviews');
    Route::get('/degelendirmelerim/degerlendirme-ekle', [ReviewController::class, "addReviewGet"])->name('addReviewGet');
    Route::post('/degelendirmelerim/degerlendirme-ekle', [ReviewController::class, "addReviewPost"])->name('addReviewPost');

    Route::get('/degelendirmelerim/degerlendirme-duzenle', [ReviewController::class, "editReviewGet"])->name('editReviewGet');
    Route::post('/degelendirmelerim/degerlendirme-duzenle', [ReviewController::class, "editReviewPost"])->name('editReviewPost');

    Route::post('/degelendirmelerim/degerlendirme-kaldır', [ReviewController::class, "deleteReview"])->name('deleteReview');

    // Favorites
    Route::get('favorilerim', [FavoritesController::class, 'index'])->name('favorites');
    Route::post('/favorilerim/favori-ekle', [FavoritesController::class, "addFavorite"])->name('addFavorite');
    Route::post('/favorilerim/favori-kaldır', [FavoritesController::class, "removeFavorite"])->name('removeFavorite');
});


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
    
    // Categories
    Route::match(['get', 'post'], '/panel/categories', 'App\Http\Controllers\Admin\CategoriesController@mainCategories')->name('admin.mainCategories');
    Route::match(['get', 'post'], '/panel/sub-categories', 'App\Http\Controllers\Admin\CategoriesController@subCategories')->name('admin.subCategories');
    Route::get('/panel/remove-category', 'App\Http\Controllers\Admin\CategoriesController@removeCategory')->name('admin.removeCategory');
    
    // Reports
    Route::match(['get', 'post'], '/panel/reports/sales', 'App\Http\Controllers\Admin\ReportsController@sales')->name('admin.reports.sales');
    Route::match(['get', 'post'], '/panel/reports/sale/{request_id}', 'App\Http\Controllers\Admin\ReportsController@sale')->name('admin.reports.sale');

    // Users
    Route::get('/panel/users', 'App\Http\Controllers\Admin\UserController@users')->name('admin.users');
    Route::get('/panel/panel-users', 'App\Http\Controllers\Admin\UserController@panelUsers')->name('admin.panelUsers');
    Route::get('/panel/panel-users/{user_id}', 'App\Http\Controllers\Admin\UserController@deletePanelUser')->name('admin.panelUsers.delete');
    Route::post('/panel/panel-users/add', 'App\Http\Controllers\Admin\UserController@addPanelUser')->name('admin.panelUsers.add');

    // Blogs
    Route::get('/panel/blogs', 'App\Http\Controllers\Admin\BlogController@index')->name('admin.blogs');
    Route::get('/panel/blogs/update-blog/{blog_id}', 'App\Http\Controllers\Admin\BlogController@updateBlogGet')->name('admin.blogs.updateBlogGet');
    Route::post('/panel/blogs/update-blog', 'App\Http\Controllers\Admin\BlogController@updateBlogPost')->name('admin.blogs.updateBlogPost');
    Route::get('/panel/blogs/add-blog', 'App\Http\Controllers\Admin\BlogController@addBlogGet')->name('admin.blogs.addBlogGet');
    Route::post('/panel/blogs/add-blog', 'App\Http\Controllers\Admin\BlogController@addBlogPost')->name('admin.blogs.addBlogPost');

    // SEO
    Route::get('/panel/seo/texts', 'App\Http\Controllers\Admin\SeoController@seoTexts')->name('admin.seo.texts');
    Route::match(['get', 'post'], '/panel/seo/add', 'App\Http\Controllers\Admin\SeoController@addSeoText')->name('admin.seo.addSeoText');
    Route::match(['get', 'post'], '/panel/seo/update/{seo_id}', 'App\Http\Controllers\Admin\SeoController@updateSeoText')->name('admin.seo.updateSeoText');
    Route::get('/panel/seo/delete/{seo_id}', 'App\Http\Controllers\Admin\SeoController@deleteSeoText')->name('admin.seo.deleteSeoText');

    
});
