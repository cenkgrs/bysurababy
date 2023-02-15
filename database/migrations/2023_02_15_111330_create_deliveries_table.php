<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('delivery_no')->notNull();
            $table->integer('driver_id')->notNull();
            $table->string('address', 250)->notNull();
            $table->integer('status')->default(0);
            $table->integer('st_delivery')->default(0);
            $table->dateTime('tt_delivery')->nullable();
            $table->integer('st_complete')->default(0);
            $table->dateTime('tt_complete')->nullable();
            $table->string('delivered_person')->nullable();
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
        Schema::dropIfExists('deliveries');
    }
}
