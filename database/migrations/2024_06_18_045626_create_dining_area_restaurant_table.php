<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dining_area_restaurant', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('dining_area_id');
            $table->timestamps();

            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('dining_area_id')->references('id')->on('dining_areas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('dining_area_restaurant', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);
            $table->dropForeign(['dining_area_id']);
        });

        Schema::dropIfExists('dining_area_restaurant');
    }
};
