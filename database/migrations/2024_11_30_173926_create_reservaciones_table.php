<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionesTable extends Migration
{
    public function up()
    {
        Schema::create('reservaciones', function (Blueprint $table) {
            $table->id('id_reservacion');
            $table->dateTime('fecha_hora');
            $table->integer('cantidad_personas');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservaciones');
    }
}
