<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('master_status') && Schema::hasTable('order_item') && !Schema::hasTable('order_status')) {
            Schema::create('order_status', function (Blueprint $table) {
                $table->unsignedBigInteger('order_id');
                $table->foreign('order_id')->references('order_id')->on('order_item')->onDelete('cascade');
                $table->unsignedBigInteger('status_id');
                $table->foreign('status_id')->references('id')->on('master_status')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_status');
    }
}
