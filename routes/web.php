<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\User\FavoritesController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\UserManagementController;

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
Route::get('/', HomeController::class, 'index')->name('index');
Route::get('/index', HomeController::class, 'index')->name('index');

// Products
Route::match(['get', 'post'], '/products', ProductsController::class, 'index')->name('products');
Route::match(['get', 'post'], '/products/{product_id}', ProductsController::class, 'product')->name('product');

// Cart
Route::get('/cart', [CartController::class, "cart"])->name('cart');
Route::post('/add-to-cart', [CartController::class, "addToCart"])->name('addToCart');
Route::post('/remove-from-cart', [CartController::class, "removeFromCart"])->name('removeFromCart');
Route::post('/change-cart', [CartController::class, "changeProductQuantity"])->name('changeProductQuantity');

// Booking
Route::match(['get', 'post'], '/booking', BookingController::class, 'booking')->name('booking');
Route::get('/finalize', BookingController::class, 'finalize')->name('finalize');

Route::get('/categories', CategoryController::class, 'index')->name('categories');

Route::get('dashboard', AuthController::class, 'dashboard')->name('dashboard');

// SEO Pages
Route::get('/vizyon', PagesController::class, 'vision')->name('vision');
Route::get('/misyon', PagesController::class, 'mission')->name('mission');
Route::get('/iletisim', PagesController::class, 'contact')->name('contact');
Route::get('/sss', PagesController::class, 'sss')->name('sss');

// Blogs
Route::get('/blogs', BlogController::class, 'index')->name('blogs');
Route::get('/blog/{slug}', BlogController::class, 'blog')->name('blog');

// Partner
Route::get('/partner', PagesController::class, 'partner')->name('partner');
Route::post('/partner-application', PagesController::class, 'partnerApply')->name('partner-application');

/* USER MANAGEMENT */

// Auth
Route::match(['get', 'post'], '/login', AuthController::class, 'login')->name('login');
Route::match(['get', 'post'], '/register', AuthController::class, 'register')->name('register');
Route::get('/logout', AuthController::class, 'signOut')->name('logout');

Route::group(['middleware' => 'checkUser'], function () {
    
    // Orders
    Route::match(['get', 'post'], '/siparislerim', OrderController::class, 'index')->name('orders');
    Route::get('/siparislerim/{request_id}', OrderController::class, 'order')->name('order');

    // Addresses
    Route::get('/adres-bilgilerim', UserManagementController::class, 'addresses')->name('addresses');
    Route::post('/adres-bilgilerim/adres-ekle', UserManagementController::class, 'addAddress')->name('addAddress');
    Route::get('/adres-bilgilerim/adres-sil/{address_id}', UserManagementController::class, 'deleteAddress')->name('deleteAddress');

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
Route::match(['get', 'post'], '/panel/login', AdminAuthController::class, 'login')->name('admin.login');
Route::get('/panel/logout', AdminAuthController::class, 'signOut')->name('admin.logout');

Route::group(['middleware' => 'checkAdmin'], function () {
    Route::get('/panel', DashboardController::class, 'index')->name('admin.index');
    Route::get('/panel/dashboard', DashboardController::class, 'index')->name('admin.index');
    
    // Admin - Products
    Route::match(['get', 'post'], 'panel/products', ProductsController::class, 'products')->name('admin.products');
    Route::match(['get', 'post'], '/panel/add-product', ProductsController::class, 'addProduct')->name('admin.products.addProduct');
    Route::get('/panel/update-product/{product_id}', ProductsController::class, 'updateProductGet')->name('admin.products.updateProductGet');
    Route::post('/panel/update-product', ProductsController::class, 'updateProductPost')->name('admin.products.updateProductPost');
    
    // Categories
    Route::match(['get', 'post'], '/panel/categories', CategoriesController::class, 'mainCategories')->name('admin.mainCategories');
    Route::match(['get', 'post'], '/panel/sub-categories', CategoriesController::class, 'subCategories')->name('admin.subCategories');
    Route::get('/panel/remove-category', CategoriesController::class, 'removeCategory')->name('admin.removeCategory');
    
    // Reports
    Route::match(['get', 'post'], '/panel/reports/sales', ReportsController::class, 'sales')->name('admin.reports.sales');
    Route::match(['get', 'post'], '/panel/reports/sale/{request_id}', ReportsController::class, 'sale')->name('admin.reports.sale');

    // Users
    Route::get('/panel/users', UserController::class, 'users')->name('admin.users');
    Route::get('/panel/panel-users', UserController::class, 'panelUsers')->name('admin.panelUsers');
    Route::get('/panel/panel-users/{user_id}', UserController::class, 'deletePanelUser')->name('admin.panelUsers.delete');
    Route::post('/panel/panel-users/add', UserController::class, 'addPanelUser')->name('admin.panelUsers.add');

    // Blogs
    Route::get('/panel/blogs', AdminBlogController::class, 'index')->name('admin.blogs');
    Route::get('/panel/blogs/update-blog/{blog_id}', AdminBlogController::class, 'updateBlogGet')->name('admin.blogs.updateBlogGet');
    Route::post('/panel/blogs/update-blog', AdminBlogController::class, 'updateBlogPost')->name('admin.blogs.updateBlogPost');
    Route::get('/panel/blogs/add-blog', AdminBlogController::class, 'addBlogGet')->name('admin.blogs.addBlogGet');
    Route::post('/panel/blogs/add-blog', AdminBlogController::class, 'addBlogPost')->name('admin.blogs.addBlogPost');

    // SEO
    Route::get('/panel/seo/texts', SeoController::class, 'seoTexts')->name('admin.seo.texts');
    Route::match(['get', 'post'], '/panel/seo/add', SeoController::class, 'addSeoText')->name('admin.seo.addSeoText');
    Route::match(['get', 'post'], '/panel/seo/update/{seo_id}', SeoController::class, 'updateSeoText')->name('admin.seo.updateSeoText');
    Route::get('/panel/seo/delete/{seo_id}', SeoController::class, 'deleteSeoText')->name('admin.seo.deleteSeoText');

    
});