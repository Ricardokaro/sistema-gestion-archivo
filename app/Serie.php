<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';
    protected $fillable = ['id', 'nombre'];  
    
    public function subSecciones(){
        return $this->hasMany('App\SubSerie');
    }

    public function inventario(){
        return $this->hasMany('App\Inventario');
    }
}
