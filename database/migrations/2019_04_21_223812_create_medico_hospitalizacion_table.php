<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicoHospitalizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medico_hospitalizacion', function (Blueprint $table) {
            $table->increments('idmedico_hospitalizacion');

            $table->integer('idhospitalizacion')->unsigned();
             
            $table->foreign('idhospitalizacion')->references('idhospitalizacion')->on('hospitalizacion');


            $table->string('licencia');
             
            $table->foreign('licencia')->references('licencia')->on('medico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medico_hospitalizacion');
    }
}
