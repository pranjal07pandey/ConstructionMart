<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('image');
            $table->string('features');
            $table->bigInteger('price');
            $table->string('measuring_unit');
            $table->boolean('delivery_facility');
            $table->string('delivery_charges')->nullable();
            $table->boolean('insurance_on_delivery');
            $table->date('product_manufactured_date')->nullable();
            $table->date('product_expiry_date')->nullable();
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('product_category_id')
                    ->references('id')
                    ->on('product_categories')
                    ->onDelete('cascade');
            $table->unsignedBigInteger('product_sub_category_id')->nullable();
            $table->foreign('product_sub_category_id')
                    ->references('id')
                    ->on('product_sub_categories')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('products');
    }
}
