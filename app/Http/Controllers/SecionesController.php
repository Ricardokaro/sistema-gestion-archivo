<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;


class SecionesController extends Controller
{
   public function index(){
        return view('secciones.index');
   }

   public function listadoSecciones(){
        $listadoSecciones = Seccion::all();
        return $listadoSecciones;
   }
   
   public function store(Request $request){
        //dd($request->all());
        $seccion = new Seccion;
        $seccion->nombre = $request->nombre;
        $seccion->save();
   }
}
