<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumbProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('table_product', function (Blueprint $table) {
            $table->foreign('sub_category_id')->references('id')->on('table_sub_category');
            $table->foreign('author_id')->references('id')->on('table_author');
            $table->foreign('publisher_id')->references('id')->on('table_publisher');
            $table->foreign('size_id')->references('id')->on('table_size');
            $table->foreign('discount_id')->references('id')->on('table_discount');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_product', function (Blueprint $table) {
            //
        });
    }
}
