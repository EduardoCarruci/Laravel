<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->increments('idorden');
         
            $table->date('fecha');
            $table->string('sintomas');

            $table->string('licencia');
            
            $table->foreign('licencia')->references('licencia')->on('medico');

            $table->string('cedula');
            
            $table->foreign('cedula')->references('cedula')->on('paciente');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cita');
    }
}
