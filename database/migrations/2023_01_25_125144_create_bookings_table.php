<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('request_id', 20)->notNull();
            $table->string('order_no', 6)->notNull();
            $table->integer('user_id')->notNull();
            $table->integer('address_id')->notNull();
            $table->float('cargo_price');
            $table->float('total_earning');
            $table->float('total_price');
            $table->integer('status');
            $table->dateTime('cargo_date');
            $table->dateTime('cancel_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
