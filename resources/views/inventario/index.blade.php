@extends('layouts.app')

@section('content')
<div class="container" id="app">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de Gestion de Inventario</div>
                <div class="panel-body">
                   
                <form method="POST" action="{{ route('crear-inventario') }}">
                {{ csrf_field() }}
                  <div class="form-group">
                    <label for="nombreSeccion">Cosecutivo</label>
                    <input type="number" class="form-control" id="consecutivoInventario" name="consecutivo" placeholder="Digite el numero consecutivo">
                  </div>                 
                  <div class="form-group">
                  <label for="secciones">Seccion</label>
                      <select class="form-control" id="secciones" name="seccion_id" v-model="seleccionar_seccion" v-on:change="cargarSubSecciones()">                           
                          
                              <option  v-for="seccion in secciones" :value="seccion.id">@{{ seccion.nombre }}</option>  
                                                                         
                      </select>
                  </div>
                
                <div class="form-group">
                  <label for="subSeccion">Sub Seccion</label>
                      <select class="form-control" id="subSeccion" name="sub_seccion_id" >                 
                      
                          @foreach ($subSecciones as $subSeccion)
                              <option value="{{ $subSeccion->id }}">{{ $subSeccion->nombre }}</option>  
                          @endforeach
                                                                        
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
                    <label for="nFolioInventario">Numero de Folios</label>
                    <input type="number" class="form-control" id="nFolioInventario" name="n_folios" placeholder="Digite el numero de folios">
                  </div>

                  <div class="row">
                 
                    <div  class="col-sm-3"> 
                    <label for="numeroCorrelativoUnoInventario">Numero Correlativo 1</label>                  
                        <input type="number" class="form-control" id="numeroCorrelativoUnoInventario" name="numero_uno" placeholder="">         
                    </div>
                    <div  class="col-sm-3"> 
                    <label for="numeroCorrelativoDosInventario">Numero Correlativo 2</label>                       
                        <input type="number" class="form-control" id="numeroCorrelativoDosInventario" name="numero_dos" placeholder="">         
                    </div>

                  </div>
                  
                  <div class="form-group">
                    <label for="fechaInicialInventario">Fecha Inicial</label>
                    <input type="date" class="form-control" id="fechaInicialInventario" name="fecha_inicial">
                  </div>

                  <div class="form-group">
                    <label for="fechaFinalInventario">Fecha Final</label>
                    <input type="date" class="form-control" id="fechaFinalInventario" name="fecha_final" >
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
                        <th scope="col">Id</th>
                        <th scope="col">Consecutivo</th>
                        <th scope="col">Nombre Seccion</th>
                        <th scope="col">Nombre Sub Seccion</th>
                        <th scope="col">Expediente</th>
                        <th scope="col">Codigo</th>
                        <th scope="col">Caja</th>
                        <th scope="col">Carpeta</th>
                        <th scope="col">Numero de Folios</th>
                        <th scope="col">Numero Correlativo 1</th>
                        <th scope="col">Numero Correlativo 2</th>
                        <th scope="col">Fecha Inicial</th>
                        <th scope="col">Fecha Final</th>
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
                {data: 'consecutivo', name: 'consecutivo'},
                {data: 'seccion.nombre', name: 'seccion.nombre'},
                {data: 'sub_seccion.nombre', name: 'sub_seccion.nombre'},
                {data: 'nombre_expediente', name: 'nombre_expediente'},
                {data: 'codigo', name: 'codigo'},
                {data: 'caja', name: 'caja'},
                {data: 'carpeta', name: 'carpeta'},
                {data: 'n_folios', name: 'n_folios'},
                {data: 'numero_uno', name: 'numero_uno'},
                {data: 'numero_dos', name: 'numero_dos'},
                {data: 'fecha_inicial', name: 'fecha_inicial'},
                {data: 'fecha_final', name: 'fecha_final'}

            ]
        });
    });
</script>

@endsection
