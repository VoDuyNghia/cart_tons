<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wards', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('prefix', 20)->nullable();
            $table->unsignedBigInteger('city_id')->index()->nullable();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('set null');
            $table->unsignedBigInteger('district_id')->index()->nullable();
            $table->foreign('district_id')
                ->references('id')
                ->on('districts')
                ->onDelete('set null');
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
        Schema::dropIfExists('districts');
    }
}
