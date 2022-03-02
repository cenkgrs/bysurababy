<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Banners;
use App\Models\Blogs;
use App\Models\BookingItems;
use App\Models\Categories;
use App\Models\Products;

use DB;

class HomeController extends Controller
{
    public function index()
    {

        $popular_products = BookingItems::select(DB::raw(""
            . "products.id, products.name, "
            . "COUNT(product_id) as product_sold"
        ))
        ->join('products', 'products.id', '=', 'booking_items.product_id')
        ->groupBy('products.id', 'products.name')->orderBy('product_sold', 'DESC')->take(5)->get();

        $products = [];

        foreach ($popular_products as $product) {
            $products[] = Products::with('price', 'category', 'sub_category', 'colors')->where('id', $product->id)->where('status', 1)->first();
        }

        $last_products = Products::with('price', 'category', 'sub_category', 'colors')->orderBy('id', 'desc')->where('parent_id', null)->where('status', 1)->take(4)->get();

        $categoryStickers = $this->getCategoryStickers();

        //$instagramPosts = $this->getInstagramPosts();

        $data = [
            "popular_products" => $products,
            "last_products" => $last_products,
            "banners" => $this->getBanners(),
            "blogs" => Blogs::get()->take(3),
            "stickers" => $this->getStickers(),
            "category_stickers" => $categoryStickers["categories"],
            "sticker_products" => $categoryStickers["products"],
            //"instagram_posts" => $instagramPosts,
        ];

        return view('home.index', $data);
    }

    public function getStickers()
    {
        $stickers = [
            "cargo" => [
                "text" => __("150 TL ve Üzeri Ücretsiz Kargo"),
                "background" => "black",
                "color" => "color-white",
                "icon" => "fa fa-truck",
            ],
            "package" => [
                "text" => __("Avantajlı Paket Fiyatları"),
                "background" => "primary",
                "color" => "color-white",
                "icon" => "fa fa-truck",
                //"icon" => "fas fa-box-open",
            ],
            "cargo_date" => [
                "text" => __("Tüm Ürünlerde Aynı Gün Kargo"),
                "background" => "dark-turqouise",
                "color" => "color-white",
                "icon" => "fa fa-truck",
                //"icon" => "fas fa-shipping-fast",
            ]
        ];

        return $stickers;
    }

    public function getCategoryStickers()
    {
        $categories = Categories::all();

        $products = [];

        foreach ($categories as $category) {
            $products[] = Products::with('price', 'category', 'sub_category', 'colors')->where('category_id', $category->id)->first();
        }

        return [
            "categories" => $categories,
            "products" => $products,
        ];
    }

    public function getBanners()
    {
        return Banners::where('slug', 'index')->get();
    }

    public function getInstagramPosts()
    {
        $items = [];
 
        $client = new \GuzzleHttp\Client;
        $url = sprintf('https://api.instagram.com/v1/users/%s/media/recent/?client_id=%s', 'bysurababy', 'bysurababy');
        $response = $client->get($url);

        dd($response);
        $items = json_decode((string) $response->getBody(), true)['items'];

        dd($items);
 
        return view('instagram',compact('items'));
    }

    
}
