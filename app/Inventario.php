<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventario;
use App\Seccion;
use App\subSeccion;

class Inventario extends Model
{
    protected $table = 'inventarios';
    protected $fillable = ['id','seccion_id','sub_seccion_id','serie_id','sub_serie_id','nombre_expediente','codigo','caja','carpeta','tomo','n_folios','f_inicial','f_final','archivo'];  
    
    public function seccion(){
        return $this->belongsTo('App\Seccion');
    }

    public function subSeccion(){
        return $this->belongsTo('App\SubSeccion');
    }

    public function serie(){
        return $this->belongsTo('App\Serie');
    }

    public function subSerie(){
        return $this->belongsTo('App\SubSerie');
    }
}
