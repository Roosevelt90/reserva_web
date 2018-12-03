<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Vuelo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vuelos',
            function (Blueprint $table) {
            $table->increments('id');
            $table->integer('precio');
            $table->integer('cantidadSillas');
            $table->timestamp('fechaHoraSalida');            
            $table->unsignedInteger('idAerolinea');
            $table->foreign('idAerolinea')->references('id')->on('aerolinea');
            $table->unsignedInteger('idCiudadOrigen');
            $table->foreign('idCiudadOrigen')->references('id')->on('ciudad');
            $table->unsignedInteger('idCiudadDestino');
            $table->foreign('idCiudadDestino')->references('id')->on('ciudad');
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
        Schema::dropIfExists('vuelos');
    }

}