<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyPurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_purchase', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('item_number');
            $table->string('df')->nullable();
            $table->string('add_adf')->nullable();
            $table->string('sites');
            $table->string('identity');
            $table->string('client');
            $table->string('month_year');
            $table->timestamps();
        });
    }

    /**group
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_purchase');
    }
}
