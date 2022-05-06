<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminHomePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_home_pages', function (Blueprint $table) {
            $table->id();
            $table->text('FeaturedFoodHeader');
            $table->text('FeaturedFoodSubText');
            $table->text('CateringTextHeader');
            $table->text('CateringSubText');
            $table->string('CateringImage');
            $table->string('PhoneNumber');
            $table->string('Location');
            $table->string('Email');
            $table->string('publish_status');
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
        Schema::dropIfExists('admin_home_pages');
    }
}
