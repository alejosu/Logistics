@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Usuarios</div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Cliente</th>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->cliente->nombre }}</td>
                                    <td><a class="btn btn-xs btn-success pull-right glyphicon glyphicon glyphicon-edit" href="borrarusuario/{{ $usuario->id }}" data-toggle="tooltip" data-placement="left"  title="Editar"></a></td>
                                    <td><a class="btn btn-xs btn-danger pull-right glyphicon glyphicon-trash" href="borrarusuario/{{ $usuario->id }}" data-toggle="tooltip" data-placement="left"  title="Borrar"></a></td>
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