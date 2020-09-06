<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->index()->nullable();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('set null');
            $table->unsignedBigInteger('product_id')->index()->nullable();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('set null');
            $table->integer('quantity')->nullable();
            $table->integer('shape')->nullable()->comment('1: Dạng bột, 2: Dạng hạt');
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
        Schema::dropIfExists('order_products');
    }
}
