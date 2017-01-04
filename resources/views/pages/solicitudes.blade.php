@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listado de Solicitudes</div>
                <div class="panel-body">
                    <a href="crearSolicitud" class="btn btn-xs btn-primary pull-right">Crear</a>
                    <table class="table table-condensed table-hover">
                        <thead>
                            <th>Id</th>
                            <th>Cliente</th>
                            <th>Estado</th>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td>{{ $solicitud->id }}</td>
                                    <td>{{ $solicitud->cliente->nombre }}</td>
                                    <td>{{ $solicitud->estado }}</td>
                                    <td><a class="btn btn-xs btn-success pull-right" href="solicitud/{{$solicitud->id}}/editar">Editar</a>
                                    </td>
                                    <td><a class="btn btn-xs btn-success pull-right" href="solicitud/{{$solicitud->id}}/viajes">Viajes</a>
                                    </td>
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