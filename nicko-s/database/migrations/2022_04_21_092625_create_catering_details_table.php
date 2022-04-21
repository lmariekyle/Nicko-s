<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCateringDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catering_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->references('id')->on('packages');
            $table->string('start_datetime');
            $table->string('end_datetime');
            $table->string('event_type');
            $table->string('event_address');
            $table->string('event_city');
            $table->string('event_town');
            $table->string('event_zipcode');
            $table->string('customer_allergies');
            $table->string('customer_notes');
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
        Schema::dropIfExists('catering_details');
    }
}
