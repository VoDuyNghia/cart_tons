<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWardIdToOrderProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('ward_id')->index()->nullable();
            $table->foreign('ward_id')
                ->references('id')
                ->on('districts')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_profiles', function (Blueprint $table) {
            $table->dropColumn('ward_id');
        });
    }
}
