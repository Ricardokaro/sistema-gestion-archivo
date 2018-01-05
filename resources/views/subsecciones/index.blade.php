@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Panel de Gestion de Sub Secciones</div>
                <div class="panel-body">
                   
                <form method="POST" action="{{ route('crear-sub-seccion') }}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="secciones">Seccion</label>
                        <select class="form-control" id="secciones" name="seccion_id">                            
                            @foreach ($secciones as $seccion)
                                <option value="{{ $seccion->id }}">{{ $seccion->nombre }}</option>  
                            @endforeach                                                  
                        </select>
                </div>


                  <div class="form-group">
                    <label for="nombreSeccion">Nombre</label>
                    <input type="text" class="form-control" id="nombreSeccion" name="nombre" placeholder="Digite el nombre de la seccion">
                  </div>                  
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection