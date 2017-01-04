@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Medidas</div>
                <div class="panel-body">
                    <a href="crearMedida" class="btn btn-primary btn-xs pull-right">Crear</a>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Descripcion</th>
                        </thead>
                        <tbody>
                            @foreach ($medidas as $medida)
                                <tr>
                                    <td>{{ $medida->id }}</td>
                                    <td>{{ $medida->descripcion }}</td>
                                    <td><a class="btn btn-xs btn-danger pull-right" href="borrarMedida/{{ $medida->id }}">Borrar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection