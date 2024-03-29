<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_coupon', function (Blueprint $table) {
            $table->increments('coupon_id');
            $table->string('coupon_name', 50);
            $table->string('coupon_code', 50);
            $table->integer('coupon_value');
            $table->integer('coupon_status');
            $table->date('coupon_expiry');
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('coupon');
    }
}
