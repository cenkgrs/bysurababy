<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->null();
            $table->varchar('code', 50)->notNull();
            $table->varchar('name', 50)->notNull();
            $table->integer('category_id', 11)->notNull();
            $table->integer('sub_category_id', 11)->notNull();
            $table->integer('price_id', 11)->notNull();
            $table->varchar('color', 50)->notNull();
            $table->enum('gender',['unisex', 'male', 'female']);
            $table->varchar('age', 50)->notNull();
            $table->varchar('photo', 50)->notNull();
            $table->integer('stock', 11)->default(0);
            $table->integer('status', 11)->default(1);
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
        Schema::dropIfExists('products');
    }
}
