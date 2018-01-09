<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {           
            $table->increments('id')->unsigned();
            $table->integer('consecutivo')->unsigned();       
            
            $table->integer('seccion_id')->unsigned();
            $table->foreign('seccion_id')
                  ->references('id')
                  ->on('secciones');
            
            $table->integer('sub_seccion_id')->unsigned();
            $table->foreign('sub_seccion_id')
                  ->references('id')
                  ->on('sub_secciones');


            $table->String('nombre_expediente');
            $table->String('codigo');
            $table->integer('caja')->unsigned();
            $table->integer('carpeta')->unsigned();
            $table->integer('n_folios')->unsigned();
            $table->integer('numero_uno')->unsigned();
            $table->integer('numero_dos')->unsigned(); 
            $table->date('fecha_inicial');
            $table->date('fecha_final');               
                  

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
        Schema::dropIfExists('inventarios');
    }
}
