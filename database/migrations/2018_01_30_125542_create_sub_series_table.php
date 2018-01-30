<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_series', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->String('nombre');
            
            $table->integer('serie_id')->unsigned();
            $table->foreign('serie_id')
                  ->references('id')
                  ->on('series');
                  

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
        Schema::dropIfExists('sub_series');
    }
}
