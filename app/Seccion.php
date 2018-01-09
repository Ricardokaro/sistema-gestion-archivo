<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Seccion extends Model
{
    protected $table = 'secciones';
    protected $fillable = ['id', 'nombre'];  
    
    public function subSecciones(){
        return $this->hasMany('App\SubSeccion');
    }

    public function inventario(){
        return $this->hasMany('App\Inventario');
    }
}
