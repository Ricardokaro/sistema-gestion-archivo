<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubSeccion;
use App\Seccion;

class SubSeccionController extends Controller
{
    public function index(){
        $secciones = Seccion::all();
        return view('subSecciones.index')
            ->with('secciones', $secciones);
    }
   
   public function store(Request $request){
        //dd($request->all());        
        $subSeccion = new SubSeccion;
        $subSeccion->nombre = $request->nombre;
        $subSeccion->seccion_id = $request->seccion_id;
        $subSeccion->save();
   }
}
