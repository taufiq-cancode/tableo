<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('minimum_capacity');
            $table->integer('maximum_capacity');
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('dining_area_id');
            $table->timestamps();

            $table->foreign('restaurant_id')->references('id')->on('restaurants')->onDelete('cascade');
            $table->foreign('dining_area_id')->references('id')->on('dining_areas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);
            $table->dropForeign(['dining_area_id']);
        });
        
        Schema::dropIfExists('tables');
    }
};
