<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /* DB::table('series')->insert([
           [ 'nombre' => 'CONTRATACIÒN DIRECTA'],
           [ 'nombre' => 'INVITACIONES PUBLICAS Y LICITACIONES CONTRACTUALES'],        
        ]);

        DB::table('sub_series')->insert([
            [ 'nombre' => 'contratos de Empréstitos', 'serie_id' => 1],
            [ 'nombre' => 'convenios Interadministrativos', 'serie_id' => 1 ],
            [ 'nombre' => 'contratos de prestación de servicios profesionales', 'serie_id' => 1 ], 
            [ 'nombre' => 'Contratos de a arrendamiento o adquisición de inmuebles', 'serie_id' => 1],
            [ 'nombre' => 'contratos de Urgencia manifiesta', 'serie_id' => 1 ],
            [ 'nombre' => 'Declaratoria de desierta de la licitación o concurso.', 'serie_id' => 1 ],
            [ 'nombre' => 'Contratos de Bienes y servicios que se requieran para la defensa y seguridad nacional.', 'serie_id' => 1],
            [ 'nombre' => 'contratos cuando no exista pluralidad de oferentes', 'serie_id' => 1 ],
            [ 'nombre' => 'contratos para el desarrollo directo de actividades científicas o tecnológicas', 'serie_id' => 1 ],
            [ 'nombre' => 'Contratos de Suministros', 'serie_id' => 1],
            [ 'nombre' => 'licitaciones publicas ', 'serie_id' => 2],
            [ 'nombre' => 'Selección abreviada', 'serie_id' => 2 ],
            [ 'nombre' => 'Concurso de merito. ', 'serie_id' => 2 ],
            [ 'nombre' => 'Proceso de mínima cuantía ', 'serie_id' => 2 ]                  
         ]);*/

         /*DB::table('sub_series')->insert([
            //[ 'nombre' => 'Contratos de Obras puiblicas', 'serie_id' => 1],   
            [ 'nombre' => 'Contratos de Consultoria', 'serie_id' => 1]        
         ]);*/
         DB::table('sub_series')->insert([
            //[ 'nombre' => 'Contratos de Obras puiblicas', 'serie_id' => 1],   
            [ 'nombre' => 'Contratos de Comodato', 'serie_id' => 1]        
         ]);
    }
}
