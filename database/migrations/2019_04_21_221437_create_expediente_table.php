<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpedienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expediente', function (Blueprint $table) {
            $table->increments('idexpediente');
            
            $table->string('historial');

            $table->integer('idficha_diagnostico')->unsigned()->unique();
            
            $table->foreign('idficha_diagnostico')->references('idficha_diagnostico')->on('ficha_diagnostico');
            
            $table->string('cedula')->unique();
            
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
        Schema::dropIfExists('expediente');
    }
}
