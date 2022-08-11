<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_product', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('sub_category_id')->nullable()->unsigned();
            $table->integer('author_id')->nullable()->unsigned();
            $table->integer('publisher_id')->nullable()->unsigned();
            $table->integer('size_id')->nullable()->unsigned();
            $table->integer('discount_id')->nullable(true)->unsigned();
            $table->string('name');
            $table->mediumText('short_description')->nullable(true);
            $table->longText('long_description')->nullable(true);
            $table->integer('quantity');
            $table->string('price');
            $table->string('image')->nullable(true);
            $table->integer('quantity_page')->nullable(true);
            $table->boolean('status')->nullable(true);
            $table->double('weight', 4, 2);
            $table->integer('view_count')->default(0)->nullable(true);
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
        Schema::dropIfExists('table_product');
    }
}
