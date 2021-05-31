<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableHotelTemQuartos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_hotel_tem_quartos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('quartos_id');
            $table->unsignedBigInteger('hotel_id');
            
            $table->foreign('quartos_id')->references('id')->on('table_quartos');
            $table->foreign('hotel_id')->references('id')->on('table_hotel');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_hotel_tem_quartos');
    }
}
