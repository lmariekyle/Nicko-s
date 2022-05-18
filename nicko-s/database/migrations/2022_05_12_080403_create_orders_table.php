<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('total_price');
            $table->string('payment_method');
            $table->string('middlename');
            $table->string('firstname');
            $table->string('lastname');
            $table->integer('phone');
            $table->string('email');
            $table->string('province');
            $table->string('city');
            $table->string('barangay');
            $table->string('municipality');
            $table->integer('zip_code');
            $table->string('street_name');
            $table->string('house_number');
            $table->tinyInteger('status')->default('0');
            $table->string('message')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
