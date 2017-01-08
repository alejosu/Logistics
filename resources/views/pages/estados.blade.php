@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Estados</div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Descripción</th>
                            <th><a href="crearEstado" class="btn btn-primary btn-xs pull-right">Crear</a></th>
                        </thead>
                        <tbody>
                            @foreach ($estados as $estado)
                                <tr>
                                    <td>{{ $estado->id }}</td>
                                    <td>{{ $estado->descripcion }}</td>
                                    <td><a class="btn btn-xs btn-success pull-right glyphicon glyphicon-pencil" href="borrarEstado/{{ $estado->id }}" data-toggle="tooltip" data-placement="left"  title="Editar"></a></td>
                                    <td><a class="btn btn-xs btn-danger pull-right glyphicon glyphicon-trash" href="borrarEstado/{{ $estado->id }}" data-toggle="tooltip" data-placement="left"  title="Borrar"></a></td>
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