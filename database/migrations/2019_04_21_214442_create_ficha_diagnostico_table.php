<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaDiagnosticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_diagnostico', function (Blueprint $table) {
            $table->increments('idficha_diagnostico');           
            $table->string('enfermedad');
            $table->string('tipo');
            $table->string('diagnostico');
            $table->string('recomendaciones');
            $table->string('intervencion');
            $table->string('orden');
            
        
            $table->integer('idorden');
             
            $table->foreign('idorden')->references('idorden')->on('cita');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_diagnostico');
    }
}
