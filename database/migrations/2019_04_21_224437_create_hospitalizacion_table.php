<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospitalizacion', function (Blueprint $table) {
            $table->increments('idhospitalizacion');
            $table->integer('idinsumos')->unsigned();
            
            $table->foreign('idinsumos')->references('idinsumos')->on('insumos');

            $table->integer('idficha_diagnostico')->unsigned()->unique();
            
            $table->foreign('idficha_diagnostico')->references('idficha_diagnostico')->on('ficha_diagnostico');

            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hospitalizacion');
    }
}
