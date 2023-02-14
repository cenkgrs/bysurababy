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
            $table->integer('parent_id')->nullable();
            $table->string('code', 50)->notNull();
            $table->string('name', 50)->notNull();
            $table->integer('category_id')->notNull();
            $table->integer('sub_category_id')->notNull();
            $table->integer('price_id')->nullable();
            $table->string('color', 50)->notNull();
            $table->enum('gender',['unisex', 'male', 'female']);
            $table->string('age', 50)->notNull();
            $table->string('photo', 50)->nullable();
            $table->integer('stock')->default(0);
            $table->integer('status')->default(1);
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
