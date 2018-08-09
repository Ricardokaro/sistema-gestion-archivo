<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seccion;
use App\SubSeccion;
use App\Inventario;
use Yajra\DataTables\Facades\DataTables;


class InventariosController extends Controller
{
    public function index(){
        $secciones = Seccion::all();
        $subSecciones = SubSeccion::all();
       
        //$secciones->load('subSecciones');      
        //dd($secciones->subSecciones);

        return view('inventario.index')
            ->with(['secciones' => $secciones,
                    'subSecciones' => $subSecciones                   
            ]);
    }

    public function store(Request $request){
        
        //dd($request->all());

        $inventario = new Inventario;
       
        $inventario->seccion_id = $request->seccion_id;
        $inventario->sub_seccion_id = $request->sub_seccion_id;
        $inventario->serie_id = $request->serie_id;
        $inventario->sub_serie_id = $request->sub_serie_id;
        $inventario->nombre_expediente =  $request->nombre_expediente;
        $inventario->codigo = $request->codigo;
        $inventario->caja = $request->caja;
        $inventario->carpeta = $request->carpeta;
        $inventario->tomo = $request->tomo;
        $inventario->n_folios = $request->n_folios; 
        $inventario->fecha_inicial = $request->fecha_inicial;
        $inventario->fecha_final = $request->fecha_final;

         //obtenemos el campo file definido en el formulario       
        $file = $request->file('archivo');
 
        //obtenemos el nombre del archivo
        $nombre = $file->getClientOriginalName();
 
        //indicamos que queremos guardar un nuevo archivo en el disco local
        \Storage::disk('local')->put($nombre,  \File::get($file));
 
        $inventario->archivo = $nombre;

        $inventario->save();
        return back();
    }

    public function verExpediente($archivo){
      $public_path = storage_path('app');      
      $url = $public_path.'/'.$archivo;
      //verificamos si el archivo existe y lo retornamos
      if (\Storage::exists($archivo))
      {
        //return $url;
        //return response()->download($url);
        return response()->file($url);
      }
      //si no se encuentra lanzamos un error 404.
      abort(404);
    }

   
    public function anyData()
    {
       $inventarioslist = Inventario::all(); 
       $inventarioslist->load('seccion', 'subSeccion','serie','subSerie');      
       return Datatables::of($inventarioslist)->addColumn('action', function ($inventario) {
       return '<a href="http://localhost/sistema-gestion-archivo/public/admin/storage/'.$inventario->archivo.'" target="_blank" class="btn btn-primary">Ver</a>';
       
       
       /*'<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal'.$inventario->id.'">
                Ver 
              </button>
              
              <!-- Modal -->  
              <div class="modal fade" id="exampleModal'.$inventario->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      
                      <div class="row">
                        <div class="col-md-4"><h4>Seccion: </h4><p>'.$inventario->seccion->nombre.'</p></div>
                        <div class="col-md-4"><h4>Sub Seccion: </h4><p>'.$inventario->subSeccion->nombre.'</p></div>   
                        <div class="col-md-4"><h4>Expediente: </h4><p>'.$inventario->nombre_expediente.'</p></div>                           
                      </div>                  
                     
                      
                      <div class="row">
                        <div class="col-md-4">                        
                            <a href="http://localhost/sistema-gestion-archivo/public/admin/storage/'.$inventario->archivo.'" target="_blank" class="btn btn-primary">Ver Expediente</a>
                        </div>
                      </div>
                      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div>';*/


        })->make(true);
    }
    
}