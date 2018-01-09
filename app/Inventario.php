<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventario;
use App\Seccion;
use App\subSeccion;

class Inventario extends Model
{
    protected $table = 'inventarios';
    protected $fillable = ['id', 'consecutivo','seccion_id','sub_seccion_id','nombre_expediente','codigo','caja','carpeta','n_folios','numero_uno','numero_dos','f_inicial','f_final'];  
    
    public function seccion(){
        return $this->belongsTo('App\Seccion');
    }

    public function subSeccion(){
        return $this->belongsTo('App\SubSeccion');
    }
}
