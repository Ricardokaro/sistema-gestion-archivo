@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de Gestion de Inventario</div>
                <div class="panel-body">
                   
                <form method="POST" enctype="multipart/form-data" action="{{ route('crear-inventario') }}">
                {{ csrf_field() }}                              
                  <div class="form-group">
                  <label for="secciones">Seccion</label>
                      <select class="form-control" id="secciones" name="seccion_id" v-model="seleccionar_seccion" v-on:change="cargarSubSecciones()">                           
                          
                              <option  v-for="seccion in secciones" :value="seccion.id">@{{ seccion.nombre }}</option>  
                                                                         
                      </select>
                  </div>
                
                <div class="form-group">
                  <label for="subSeccion">Sub Seccion</label>
                      <select class="form-control" id="subSeccion" name="sub_seccion_id" >          
                      
                         
                              <option v-for="sub_seccion in sub_secciones" :value="sub_seccion.id">@{{ sub_seccion.nombre }}</option>  
                        
                                                                        
                      </select>
                  </div>

                <div class="form-group">
                  <label for="secciones">Serie</label>
                      <select class="form-control" id="series" name="serie_id" v-model="seleccionar_serie" v-on:change="cargarSubSeries()">                           
                          
                              <option  v-for="serie in series" :value="serie.id">@{{ serie.nombre }}</option>  
                                                                         
                      </select>
                  </div>
                
                <div class="form-group">
                  <label for="subSeccion">Sub Serie</label>
                      <select class="form-control" id="subSerie" name="sub_serie_id" >          
                      
                         
                              <option v-for="sub_serie in sub_series" :value="sub_serie.id">@{{ sub_serie.nombre }}</option>  
                        
                                                                        
                      </select>
                  </div>                                  

                  <div class="form-group">
                    <label for="nombreExpediente">Nombre del Expediente</label>
                    <input type="text" class="form-control" id="nombreExpediente" name="nombre_expediente" placeholder="Digite el nombre del expediente">
                  </div>

                  <div class="form-group">
                    <label for="codigoInventario">Codigo</label>
                    <input type="text" class="form-control" id="codigoInventario" name="codigo" placeholder="Digite el codigo">
                  </div>

                  <div class="form-group">
                    <label for="cajaInventario">Caja</label>
                    <input type="number" class="form-control" id="cajaInventario" name="caja" placeholder="Digite el numero de la caja">
                  </div>

                  <div class="form-group">
                    <label for="carpetaInventario">Carpeta</label>
                    <input type="number" class="form-control" id="carpetaInventario" name="carpeta" placeholder="Digite el numero de la carpeta">
                  </div>

                  <div class="form-group">
                    <label for="tomoInventario">Tomo</label>
                    <input type="number" class="form-control" id="tomoInventario" name="tomo" placeholder="Digite el numero deL tomo">
                  </div>

                  <div class="form-group">
                    <label for="nFolioInventario">Numero de Folios</label>
                    <input type="number" class="form-control" id="nFolioInventario" name="n_folios" placeholder="Digite el numero de folios">
                  </div>                 
                  
                  <div class="form-group">
                    <label for="fechaInicialInventario">Fecha Inicial</label>
                    <input type="date" class="form-control" id="fechaInicialInventario" name="fecha_inicial">
                  </div>

                  <div class="form-group">
                    <label for="fechaFinalInventario">Fecha Final</label>
                    <input type="date" class="form-control" id="fechaFinalInventario" name="fecha_final" >
                  </div>

                  <div class="form-group">
                    <label for="archivoInventario">Cargar Expediente</label>
                    <input type="file" class="form-control" id="archivoInventario" name="archivo" placeholder="Digite el codigo">
                  </div>

                    <hr>
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-14 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                <div class="row">
                    <div class="col-md-3">
                        Inventario
                    </div>                    
                </div>           

                </div>
                <div class="panel-body">

                <table class="table" id="tabla-inventario">
                    <thead>
                        <tr>                       
                        <th scope="col">Consecutivo</th>
                        <th scope="col">Seccion</th>
                        <th scope="col">Sub Seccion</th>
                        <th scope="col">Serie</th>
                        <th scope="col">Sub Serie</th>
                        <th scope="col">Expediente</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Caja</th>
                        <th scope="col">Carpeta</th>
                        <th scope="col">Tomo</th>
                        <th scope="col">Numero de Folios</th>                                              
                        <th scope="col">Fecha Inicial</th>
                        <th scope="col">Fecha Final</th>
                        <th scope="col">action</th>                        
                        </tr>
                    </thead>
                   
                    </table>

                </div>    
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {

        oTable = $('#tabla-inventario').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('listado-inventarios') }}",
            "columns": [          
                
                {data: 'id', name: 'id'},
                {data: 'seccion.nombre', name: 'seccion.nombre'},
                {data: 'sub_seccion.nombre', name: 'sub_seccion.nombre'},
                {data: 'serie.nombre', name: 'serie.nombre'},
                {data: 'sub_serie.nombre', name: 'sub_serie.nombre'},
                {data: 'nombre_expediente', name: 'nombre_expediente'},
                {data: 'codigo', name: 'codigo'},
                {data: 'caja', name: 'caja'},
                {data: 'carpeta', name: 'carpeta'},
                {data: 'tomo', name: 'tomo'},
                {data: 'n_folios', name: 'n_folios'},                
                {data: 'fecha_inicial', name: 'fecha_inicial'},
                {data: 'fecha_final', name: 'fecha_final'},
                {data: 'action', name: 'archivo', orderable: false, searchable: false}
            ]
        });       
    });    
      

        
       
</script>

@endsection
