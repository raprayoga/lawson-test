<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('city') && !Schema::hasTable('merchant')) {
            Schema::create('merchant', function (Blueprint $table) {
                $table->id();
                $table->string('merchant_name');
                $table->unsignedBigInteger('city_id');
                $table->foreign('city_id')->references('id')->on('city')->onDelete('cascade');
                $table->text('address');
                $table->string('phone');
                $table->date('expired_date');
                $table->timestamps();
                $table->softDeletes($column = 'deleted_at', $precision = 0);
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
        Schema::dropIfExists('merchant');
    }
}
