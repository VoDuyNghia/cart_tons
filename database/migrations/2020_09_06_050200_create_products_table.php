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
            $table->bigIncrements('id');
            $table->string('name')->unique()->nullable();
            $table->string('slug')->nullable();
            $table->text('detail')->nullable();
            $table->text('description')->nullable();
            $table->integer('rate')->default(1)->nullable();
            $table->string('image')->nullable();
            $table->float('price', 14, 2)->nullable();
            $table->float('sale_price', 14, 2)->nullable();
            $table->integer('status')->nullable();
            $table->integer('order')->nullable()->comment('1: Show, 0: Hide');
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
