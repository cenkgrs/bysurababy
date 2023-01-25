<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillingInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billing_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('request_id', 20);
            $table->string('name', 50);
            $table->string('surname', 50);
            $table->string('phone', 11);
            $table->string('city', 50);
            $table->string('district', 50);
            $table->string('address', 50);
            $table->string('type', 20);
            $table->string('zip_no', 50);
            $table->string('firm_name', 50);
            $table->string('tax_authority', 50);
            $table->string('tax_no', 50);
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
        Schema::dropIfExists('billing_informations');
    }
}
