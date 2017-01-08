@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Clientes</div>
                <div class="panel-body">
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th><a href="crearCliente" class="btn btn-xs btn-primary pull-right">Crear</a></th>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <td>{{ $cliente->id }}</td>
                                    <td>{{ $cliente->nombre }}</td>
                                    <td><a class="btn btn-xs btn-success pull-right glyphicon glyphicon-pencil" href="editarCliente/{{ $cliente->id }}"></a></td>
                                    <td><a class="btn btn-xs btn-danger pull-right glyphicon glyphicon-trash" href="borrarCliente/{{ $cliente->id }}"></a></td>
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