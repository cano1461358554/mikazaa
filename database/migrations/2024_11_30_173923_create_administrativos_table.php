<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativosTable extends Migration
{
    public function up()
    {
        Schema::create('administrativos', function (Blueprint $table) {
            $table->id('id_administrativo');
            $table->string('departamento', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('administrativos');
    }
}
