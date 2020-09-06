<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('status')->nullable()->default('1')->comment('1: Chờ xử lý, 2: Đang xử lý, 3: Đang giao hàng, 4: Giao hàng thành công, 5: Đơng hàn bị hủy');
            $table->float('price', 14, 2)->nullable();
            $table->float('shipping_price', 14, 2)->nullable();
            $table->float('total', 14, 2)->nullable();
            $table->unsignedBigInteger('order_profile_id')->index()->nullable();
            $table->foreign('order_profile_id')
                ->references('id')
                ->on('order_profiles')
                ->onDelete('set null');
            $table->integer('order')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
