<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSerie extends Model
{
    protected $table = 'sub_series';
    protected $fillable = ['id', 'nombre','serie_id'];  
    
    public function seccion(){
        return $this->belongsTo('App\Serie');
    }

    public function inventario(){
        return $this->hasMany('App\Inventario');
    }
}
