<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->bigInteger('phone_number')->unique();
            $table->string('address');
            $table->string('email')->nullable();
            $table->string('message')->nullable();
            $table->unsignedBigInteger('serviceCategory_id');
            $table->foreign('serviceCategory_id')
                    ->references('id')
                    ->on('service_categories')
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
        Schema::dropIfExists('services');
    }
}
