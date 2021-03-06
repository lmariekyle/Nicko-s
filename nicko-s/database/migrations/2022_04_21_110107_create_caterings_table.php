<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caterings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catering_detail_id')->references('id')->on('catering_details');
            $table->foreignId('customer_id');
            $table->integer('total_price');
            $table->integer('total_payments');
            $table->enum('catering_status', ['pending', 'approved', 'cancelled', 'completed']);
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
        Schema::dropIfExists('caterings');
    }
}
