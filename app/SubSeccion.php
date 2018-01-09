<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSeccion extends Model
{
    protected $table = 'sub_secciones';
    protected $fillable = ['id', 'nombre','seccion_id'];  
    
    public function seccion(){
        return $this->belongsTo('App\Seccion');
    }

    public function inventario(){
        return $this->hasMany('App\Inventario');
    }
}
