<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('PackageName');
            $table->string('LechonQty');
            $table->string('FoodQty');
            $table->text('Foods');
            $table->string('DessertQty');
            $table->text('Desserts');
            $table->string('BeverageQty');
            $table->text('Beverages');
            $table->string('TablesQty');
            $table->string('ChairsQty');
            $table->string('DiningSetQty');
            $table->text('Decoration');
            $table->text('Description');
            $table->integer('Price');
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
        Schema::dropIfExists('packages');
    }
}
