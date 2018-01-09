<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;
use App\SubSeccion;
use App\Inventario;

class InventariosController extends Controller
{
    public function index(){
        $secciones = Seccion::all();
        $subSecciones = SubSeccion::all();
        $inventarioslist = Inventario::all();
        //dd($inventarioslist);

        return view('inventario.index')
            ->with(['secciones' => $secciones,
                    'subSecciones' => $subSecciones,
                    'inventarioslist' => $inventarioslist    
            ]);
    }

    public function store(Request $request){
        
        //dd($request->all());

        $inventario = new Inventario;

        $inventario->consecutivo = $request->consecutivo;
        $inventario->seccion_id = $request->seccion_id;
        $inventario->sub_seccion_id = $request->sub_seccion_id;
        $inventario->nombre_expediente =  $request->nombre_expediente;
        $inventario->codigo = $request->codigo;
        $inventario->caja = $request->caja;
        $inventario->carpeta = $request->carpeta;
        $inventario->n_folios = $request->n_folios;        
        $inventario->numero_uno = $request->numero_uno;
        $inventario->numero_dos = $request->numero_dos;
        $inventario->fecha_inicial = $request->fecha_inicial;
        $inventario->fecha_final = $request->fecha_final;

        $inventario->save();
    }

    public function buscar(Request $request){
        $buscar = $request->buscar;
        $tipo = $request->tipo;

        if($buscar == '3'){
            $inventarios = DB::table('inventarios')->where('nombre_expediente', 'LIKE','%'.$buscar.'%')->get();
            dd($inventario); 
        }
        
    }
}