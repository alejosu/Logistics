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
                                    <td><a class="btn btn-xs btn-success pull-right" href="editarCliente/{{ $cliente->id }}">Editar</a></td>
                                    <td><a class="btn btn-xs btn-danger pull-right" href="borrarCliente/{{ $cliente->id }}">Borrar</a></td>
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