<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrdersTableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable()->default(null);
            $table->integer('payment_id')->unsigned()->nullable()->default(null);
            $table->integer('shipping_id')->unsigned()->nullable()->default(null);
            $table->string('order_status')->nullable()->default('Đang xử lý đơn hàng');
            $table->string('shipping_address')->nullable();
            $table->string('phoneReceiver')->nullable();
            $table->string('nameReceiver')->nullable();
            
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
        Schema::dropIfExists('table_orders');
    }
}
