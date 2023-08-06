<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTaxFirmFieldsOnBillingInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('billing_informations', function (Blueprint $table) {
            $table->string('firm_name', 50)->nullable()->change();
            $table->string('tax_authority', 50)->nullable()->change();
            $table->string('tax_no', 50)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
