<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalHospitalizacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_hospitalizacion', function (Blueprint $table) {
            $table->increments('idpersonal_hospitalizacion');

            $table->integer('idhospitalizacion')->unsigned();
             
            $table->foreign('idhospitalizacion')->references('idhospitalizacion')->on('hospitalizacion');


            $table->integer('cedula')->unsigned();
             
            $table->foreign('cedula')->references('cedula')->on('personal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_hospitalizacion');
    }
}
