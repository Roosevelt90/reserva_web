<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva',
            function (Blueprint $table) {
            $table->increments('id');
            $table->integer('numeroReserva');
            $table->integer('numeroSilla');
            $table->string('observaciones');
            $table->unsignedInteger('idClase');
            $table->foreign('idClase')->references('id')->on('clase');
            $table->unsignedInteger('idPasajero');
            $table->foreign('idPasajero')->references('id')->on('pasajero');
            $table->unsignedInteger('idEstado');
            $table->foreign('idEstado')->references('id')->on('estado');
            $table->unsignedInteger('idVuelo');
            $table->foreign('idVuelo')->references('id')->on('vuelo');
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
        Schema::dropIfExists('reserva');
    }

}