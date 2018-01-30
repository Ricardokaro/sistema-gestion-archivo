<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoSerieSubSerieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventarios', function($table)
        {
            $table->integer('serie_id')->unsigned();
                $table->foreign('serie_id')
                    ->references('id')
                    ->on('series');
                                
                $table->integer('sub_serie_id')->unsigned();
                $table->foreign('sub_serie_id')
                    ->references('id')
                    ->on('sub_series');  
        });            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
