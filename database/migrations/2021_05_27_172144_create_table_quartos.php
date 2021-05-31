<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableQuartos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_quartos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->float('Diaria',8,2);
            $table->integer('Tamanho');
            $table->integer('Camas');
            $table->string('Nome');
            $table->string('Sobre');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_quartos');
    }
}
