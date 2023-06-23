<?php

namespace App\Console\Commands;

use App\Models\BookingItems;
use App\Models\Products;
use App\Models\SalesWith;
use Illuminate\Console\Command;

class PrepareSaleWithData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:preparesalewithdata';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Gets products that saled with each product';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $products = Products::get();

        foreach ($products as $product) {

            $sales = [];

            // Get sale data
            $booking_items = BookingItems::where('product_id', $product->id)->get();

            foreach ($booking_items as $item) {
                $request_id = $item->request_id;

                $relatives = BookingItems::with('product')->where('request_id', $request_id)->whereNot('product_id', $product->id)->get();

                foreach ($relatives as $r) {

                    if ($r->stock == 0) {
                        continue;
                    }

                    if (!isset($sales[$r->product_id])) {
                        $sales[$r->parent_id ? $r->parent_id : $r->product_id]['count'] = 1; 
                    } else {
                        $sales[$r->parent_id ? $r->parent_id : $r->product_id]['count'] += 1;
                    }
                }
            }

            // Sort sales array and get first 3 
            usort($sales, function ($a, $b) { return $b['count'] - $a['count']; });

            $count = 0;

            foreach ($sales as $key => $s) {

                $count++;

                if ($count > 3) {
                    break;
                }

                SalesWith::insert([
                    'product_id' => $product->id,
                    'relative_id' => $key,
                    'rating' => $count 
                ]);

            }
         
        }
    }
}
