<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailybasesPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailybases_purchase', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->nullable();
            $table->string('item_number')->nullable();
            $table->string('stock_in_hand')->nullable();
            $table->string('stock_in_transit')->nullable();
            $table->string('mtd_sales')->nullable();
            $table->string('pending_customer_order')->nullable();
            $table->string('identity');
            $table->string('client');
            $table->string('sites');
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
        Schema::dropIfExists('dailybases_purchase');
    }
}
