<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubSecciones extends Model
{
    protected $table = 'sub_secciones';
    protected $fillable = ['id', 'nombre','id_seccion'];  
    
    public function Seccion(){
        return $this->belongsTo('App\Seccion');
    }
}
