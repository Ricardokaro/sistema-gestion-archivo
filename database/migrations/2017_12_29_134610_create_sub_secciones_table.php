<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubSeccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
        Schema::create('sub_secciones', function (Blueprint $table) {           
            $table->increments('id')->unsigned();
            $table->String('nombre');
            
            $table->integer('seccion_id')->unsigned();
            $table->foreign('seccion_id')
                  ->references('id')
                  ->on('secciones');
                  

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
        Schema::dropIfExists('sub_secciones');
    }
}
